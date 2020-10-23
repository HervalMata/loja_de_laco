<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required'
            ];
            $customMessages = [
                'email.required' => 'Email é requerido',
                'email.email' => 'Email válido é requerido',
                'password.required' => 'Senha é requerida',
            ];
            $this->validate($request, $rules, $customMessages);
            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect('admin/dashboard');
            } else {
                Session::flash('error_message', 'Email ou Senhas inválidos');
                return redirect()->back();
            }


        }
        return view('admin.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

    public function settings()
    {
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        return view('admin.settings')->with(compact('adminDetails'));
    }

    public function chkCurrentPassword(Request $request)
    {
        $data = $request->all();
        if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
            echo "true";
        } else {
            echo "false";
        }
    }

    public function updateCurrentPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (Hash::check($data['current_pwd'], Auth::guard('admin')->user()->password)) {
                if ($data['new_pwd'] == $data['confirm_pwd']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_pwd'])]);
                    Session::flash('success_message', 'A senha foi atualizada com sucesso.');
                } else {
                    Session::flash('error_message', 'A nova senha e sua confirmação não são iguais');
                }
            } else {
                Session::flash('error_message', 'Sua senha atual está incorreta');
                return redirect()->back();
            }
            return redirect()->back();
        }
    }

    public function updateAdminDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rules = [
                'name' => 'required|regex:/^[pL\s\-]+$/u',
                'admin_mobile' => 'required|numeric'
            ];
            $customMessages = [
                'name.required' => 'Nome é requerido',
                'name.alpha' => 'Nome válido é requerido',
                'admin_mobile.required' => 'Celular é requerido',
                'admin_mobile.numeric' => 'Celular válido é requerido'
            ];
            $this->validate($request, $rules, $customMessages);
            Admin::where('email', Auth::guard('admin')->user()->email)
                ->update(['name' => $data['name'], 'mobile' => $data['admin_mobile']]);
            Session::flash('success_message', 'Detalhes do Admin foi atualizado com sucesso.');
            return redirect()->back();
        }
        return view('admin.update_admin_details');
    }

}

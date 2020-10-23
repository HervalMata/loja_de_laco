@extends('layouts.admin_layout.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Perfil</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Perfil</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Atualizar Detalhes do Admin</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{url('/admin/update-admin-details')}}"
                                  name="updateAdminDetails" id="updateAdminDetails">
                                @csrf
                                @if(Session::has('error_message'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{Session::get('error_message')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if(Session::has('success_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{Session::get('success_message')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger" style="margin-top: 10px;">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome"
                                               value="{{Auth::guard('admin')->user()->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Email" readonly
                                               value="{{Auth::guard('admin')->user()->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Tipo</label>
                                        <input type="text" class="form-control" id="type" name="type" placeholder="Tipo"
                                               readonly
                                               value="{{Auth::guard('admin')->user()->type}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="admin_mobile">Celular</label>
                                        <input type="text" class="form-control" id="admin_mobile"
                                               name="admin_mobile" placeholder="Celular" required
                                               value="{{Auth::guard('admin')->user()->mobile}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="admin_image">Imagem</label>
                                        <input type="file" class="form-control" id="admin_image" name="admin_image"
                                               placeholder="Imagem" required>
                                    </div>
                                    {{--<div class="form-group">
                                        <label for="confirm_pwd">Confirmar Senha</label>
                                        <input type="password" class="form-control" id="confirm_pwd"
                                               name="confirm_pwd" placeholder="Confirmar Senha" required>
                                    </div>--}}
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

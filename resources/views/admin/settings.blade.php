@extends('layouts.admin_layout.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Alterar Senha</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Alterar Senha</li>
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
                                <h3 class="card-title">Atualizar Senha</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{url('/admin/update-current-pwd')}}"
                                  name="updatePasswordForm" id="updatePasswordForm">
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
                                <div class="card-body">
                                    {{--<div class="form-group">
                                        <label for="name">Nome</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nome"
                                               value="{{$adminDetails->name}}">
                                    </div>--}}
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Email" readonly
                                               value="{{$adminDetails->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Tipo</label>
                                        <input type="text" class="form-control" id="type" name="type" placeholder="Tipo"
                                               readonly
                                               value="{{$adminDetails->type}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="current_pwd">Senha Atual</label>
                                        <input type="password" class="form-control" id="current_pwd"
                                               name="current_pwd" placeholder="Senha Atual" required>
                                        <span id="chkCurrentPwd"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="new_pwd">Nova Senha</label>
                                        <input type="password" class="form-control" id="new_pwd" name="new_pwd"
                                               placeholder="Nova Senha" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_pwd">Confirmar Senha</label>
                                        <input type="password" class="form-control" id="confirm_pwd"
                                               name="confirm_pwd" placeholder="Confirmar Senha" required>
                                    </div>
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

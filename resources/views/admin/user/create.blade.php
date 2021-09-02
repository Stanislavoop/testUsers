@extends('layouts.admin_layout')

@section('title', 'Создание пользователя')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавить пользователя</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" data-dismiss="alert" aria-hidden="true" class="close"></button>
                        <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
                    </div>
                @endif
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <!-- form start -->
                            <form action="{{route('user.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Имя</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Введите имя пользователя" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Почта</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Введите почту пользователя" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pass">Пароль</label>
                                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль пользователя" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Выберите роль пользователя</label>
                                            <select name="role" class="form-control">
                                                @foreach($roles as $role)
                                                    <option value="{{$role->name}}">{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

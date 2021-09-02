@extends('layouts.admin_layout')

@section('title', 'Создание пользователя')

@section('content')
    <?php
    $role_user = $user->getRoleNames();
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактировать пользователя {{$user->name}}</h1>
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
                            <form action="{{route('user.update', $user['id'])}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Имя</label>
                                        <input type="text" value="{{$user['name']}}" class="form-control" name="name" id="name" placeholder="Введите имя пользователя" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Почта</label>
                                        <input type="email" class="form-control" value="{{$user['email']}}" name="email" id="email" placeholder="Введите почту пользователя" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Выберите роль пользователя</label>
                                        <select name="role" class="form-control">
                                            @foreach($roles as $role)
                                                <option value="{{$role->name}}" @if($role->name == $role_user[0]) selected @endif>{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Изменить</button>
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


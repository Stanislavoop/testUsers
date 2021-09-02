@extends('layouts.admin_layout')

@section('title', 'Создание пользователя')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Все пользователи</h1>
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
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                <tr>
                                    <th style="width: 5%">
                                        ID
                                    </th>
                                    <th style="width: 20%">
                                        Name
                                    </th>
                                    <th style="width: 20%">
                                        Email
                                    </th>
                                    <th style="width: 20%">
                                        Role
                                    </th>
                                    <th style="width: 35%">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            {{$user->id}}
                                        </td>
                                        <td>
                                            {{$user->name}}
                                        </td>
                                        <td>
                                            {{$user->email}}
                                        </td>
                                        <td>
                                            {{str_replace(['[', ']', '"'], ['', '', ''], $user->getRoleNames())}}
                                        </td>
                                        <td class="project-actions text-right row justify-content-end">
                                            <a class="ml-1 btn btn-info btn-sm" href="{{route('user.edit', $user->id)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit user
                                            </a>
                                            <form action="{{route('user.destroy', $user->id )}}" method="POST" class="ml-1">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

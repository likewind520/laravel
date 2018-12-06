@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">

        <!-- Header -->
        <div class="header mt-md-2">
            <div class="header-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h2 class="header-title">
                            用户管理
                        </h2>

                    </div>

                </div> <!-- / .row -->
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route('role.user.index')}}" class="nav-link active">
                                    用户列表
                                </a>

                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="table-responsive mb-0" data-toggle="lists"
                 data-lists-values="[&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]">
                <table class="table table-sm table-nowrap card-table">
                    <thead>
                    <tr>
                        <th>编号</th>
                        <th>用户昵称</th>
                        <th>邮箱</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                                    <a href="{{route('role.user.user_set_role_create',$user)}}" class="btn btn-success">设置角色</a>
                                    <button onclick="del(this)" type="button" class="btn btn-danger">删除</button>
                                    <form action="" method="post">
                                        @csrf  @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$users->links()}}
    </div>
@endsection
@push('js')

@endpush

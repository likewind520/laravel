@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 ">
                <!-- Header -->
                <div class="header mt-md-2">
                    <div class="header-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <!-- Title -->
                                <h2 class="header-title">
                                    栏目管理
                                </h2>

                            </div>

                        </div> <!-- / .row -->
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Nav -->
                                <ul class="nav nav-tabs nav-overflow header-tabs">
                                    <li class="nav-item">
                                        <a href="{{route('admin.category.index')}}" class="nav-link active">
                                            栏目列表
                                        </a>

                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('admin.category.create')}}" class="nav-link ">
                                            添加栏目
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">

                                <!-- Buttons -->
                                <a href="{{route('admin.category.create')}}" class="btn btn-white btn-sm">
                                    添加栏目
                                </a>

                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div> <!-- / .row -->
        <div class="card">
            <div class="table-responsive mb-0" data-toggle="lists" data-lists-values="[&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]">
                <table class="table table-sm table-nowrap card-table">
                    <thead>
                    <tr>
                        <th style="font-size:13px">编号</th>
                        <th style="font-size:13px">栏目标题</th>
                        <th style="font-size:13px">栏目图标</th>
                        <th style="font-size:13px">#</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->title}}</td>
                            <td><span class="{{$category->icon}}"></span></td>
                            <td>
                                <div class="btn-group btn-group-sm" role="group" aria-label="First group">
                                    {{--<a href="/admin/category/{{$category['id']}}/edit" class="btn btn-white">编辑</a>--}}
                                    <a href="{{route('admin.category.edit',$category)}}" class="btn btn-white">编辑</a>
                                    {{--                                <a href="{{route('admin.category.edit',['id'=>$category['id']])}}" class="btn btn-white">编辑</a>--}}
                                    <button onclick="del(this)" type="button" class="btn btn-white">删除</button>
                                    <form action="{{route('admin.category.destroy',$category)}} " method="post">
                                        @csrf @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{--框架自带引入分页器--}}{{--请记住，该links方法生成的HTML 与Bootstrap CSS框架兼容。--}}
        {{$categories->links()}}
    </div>

@endsection
{{--push 引js的站位符--}}
@push('js')
    <script>
        function del(obj) {
            require(['hdjs','bootstrap'], function (hdjs) {
                hdjs.confirm('确定删除吗?', function () {
                    $(obj).next('form').submit(); //点击删除按钮触发js删除，但数据库并没有删除。需要
                                                    //form表单将要删除的id数据以表单的方式提交到路由中的方法中删除数据库中的数据
                })
            })
        }
    </script>

@endpush
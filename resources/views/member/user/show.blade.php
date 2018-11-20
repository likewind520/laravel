@extends('home.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @include('member.layouts.menu')
            <div class="col-sm-9">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- Files -->
                            <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">

                                            <!-- Title -->
                                            <h4 class="card-header-title">
                                                他的文章
                                            </h4>

                                        </div>

                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="{{route('home.article.create')}}" class="btn btn-sm btn-primary">
                                                    发表文章
                                                </a>

                                            </div>

                                    </div> <!-- / .row -->
                                </div>

                                <div class="card-body">

                                    <!-- List -->
                                    <ul class="list-group list-group-lg list-group-flush list my--4">

                                            <li class="list-group-item px-0">

                                                <div class="row align-items-center">

                                                    <div class="col ml--2">

                                                        <!-- Title -->
                                                        <h4 class="card-title mb-1 name">
                                                            <a href="">dd</a>
                                                        </h4>

                                                        <p class="card-text small mb-1">
                                                            <a href="" class="text-secondary mr-2">
                                                                <i class="fa fa-user-circle" aria-hidden="true"></i> eee
                                                            </a>

                                                            <i class="fa fa-clock-o" aria-hidden="true"></i> tt

                                                            <a href="http://www.houdunren.com/edu/topics_1.html" class="text-secondary ml-2">
                                                                <i class="fa fa-folder-o" aria-hidden="true"></i> hh</a>
                                                        </p>

                                                    </div>
                                                    <div class="col-auto">

                                                        <!-- Dropdown -->
                                                        <div class="dropdown">
                                                            <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fe fe-more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="" class="dropdown-item">
                                                                    查看详情
                                                                </a>

                                                                    <a href="" class="dropdown-item">
                                                                        编辑
                                                                    </a>


                                                                    <a href="javascript:;" onclick="del(this)" class="dropdown-item">
                                                                        删除
                                                                    </a>
                                                                    <form action="" method="post">

                                                                    </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div> <!-- / .row -->
                                            </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>

        </div>
    </div>
@endsection

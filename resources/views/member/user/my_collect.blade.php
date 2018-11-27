@extends('home.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @include('member.layouts.menu')
            <div class="col-sm-9">
                <div class="container-fluid">

                        <div class="row">

                                <div class="col-12 col-md-6 col-xl-4">
                                    <!-- Card -->
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <a href="" class="avatar avatar-xl card-avatar ">
                                                <img src="" class="avatar-img rounded-circle border border-white" alt="...">
                                            </a>

                                            <h2 class="card-title">
                                                <a href="">11</a>
                                            </h2>

                                            <p class="card-text">
                                          <span class="badge badge-soft-secondary">
                                            粉丝:
                                          </span>
                                                <span class="badge badge-soft-secondary">
                                            关注:
                                          </span>
                                            </p>

                                                <hr>
                                                <div class="col-auto">
                                                    <a href="" class="btn btn-block btn-sm btn-white">



                                                            收藏

                                                    </a>
                                                </div>

                                        </div>
                                    </div>

                                </div>

                        </div>


                </div>

            </div>

        </div>
    </div>
@endsection

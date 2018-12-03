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
                            轮播管理
                        </h2>

                    </div>

                </div> <!-- / .row -->
                <div class="row align-items-center">
                    <div class="col">

                        <!-- Nav -->
                        <ul class="nav nav-tabs nav-overflow header-tabs">
                            <li class="nav-item">
                                <a href="{{route('admin.carousels.index',$carousel)}}" class="nav-link ">
                                    轮播列表
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.carousels.edit',$carousel)}}" class="nav-link active">
                                    编辑轮播
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-auto">

                        <!-- Buttons -->
                        <a href="{{route('admin.carousels.edit',$carousel)}}" class="btn btn-white btn-sm">
                            编辑轮播
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center ">
           <div class="col-8 ">
            <form method="post" action="">
                {{--<div class="card">--}}
                    {{--<div class="card-body">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputEmail1">列表名</label>--}}
                            {{--<input type="text" name="title" value="{{$carousel['name']}}" class="form-control" id="exampleInputEmail1" placeholder="">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="card">

                    @csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">图片名</label>
                            <input type="text" name="name" value="{{$carousel['name']}}" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputEmail1">图片样式</label>--}}
                            {{--<input type="text" name="style" value="{{$carousel['style']}}"class="form-control"  id="exampleInputEmail1" placeholder="">--}}
                        {{--</div>--}}
                        <div class="input-group mb-1">
                            <input class="form-control  form-control-sm" name='icon' readonly="" value="{{$carousel['icon']}}">
                            <div class="input-group-append">
                                <button onclick="upImagePc(this)" class="btn btn-secondary"   type="button">单图上传</button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">保存</button>
                        <textarea name="data" hidden id="" cols="30" rows="10"></textarea>

                    </div>

                </div>
            </form>
           </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        require['hdjs','bootstrap'];
        function upImagePc() {
            require(['hdjs'], function (hdjs) {
                var options = {
                    multiple: false,//是否允许多图上传
                    //data是向后台服务器提交的POST数据
                    data: {name: '后盾人', year: 2099},
                };
                hdjs.image(function (images) {
                    // alert(1);
                    // 提交表单做头像修改
                    $("[name='icon']").val(images[0]);
                    $(".avatar-img").attr('src', images[0]);
                    $('#imgIcon').submit();
                }, options)
            });
        }
    </script>
@endpush
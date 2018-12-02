<div class="col-sm-6">
    <div class="input-group mb-1">
        <input class="form-control  form-control-sm" name="thumb" readonly="" value="">
        <div class="input-group-append">
            <button onclick="upImagePc(this)" class="btn btn-secondary" type="button">单图上传</button>
        </div>
    </div>
    <form id="editIocn" action="{{route('admin.carousels.store')}}" method="post" class="col-sm-8" id="form-icon">
        @csrf @method('PUT')
        <input type="hidden" name="icon" value="">
    </form>
</div>
@endsection
@push('js')
<script>
    require(['hdjs','bootstrap']);
    //上传图片
    function upImagePc() {
        require(['hdjs'], function (hdjs) {
            var options = {
                multiple: false,//是否允许多图上传
                //data是向后台服务器提交的POST数据
                data: {name: '后盾人', year: 2099},
            };
            hdjs.image(function (images) {

                //将返回的图片路径写入到input表单的val值
                //提交表单做头像修改
                $("[name='thumb']").val(images[0]);
                //将上传返回的图片写入avatar-img元素的src
                $(".avatar-img").attr('src', images[0]);
                //触发表单提交
                $('#editIocn').submit();
            }, options)
        });
    }
</script>
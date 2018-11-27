<div class="col-sm-3" id="left_menu">
    <div class="card">
        <div class="card-block text-center pt-5">
            <div class="avatar avatar-xxl">
                <a href="{{route('member.user.show',$user)}}">
                    <img src="{{$user->icon}}" class="avatar-img rounded-circle">
                </a>
            </div>
            <div class="text-center mt-4">
                <a href="">
                    <h3 class="text-secondary">{{$user->name}}</h3>
                </a>
            </div>
        </div>
        <div class="card-body text-center pt-1 pb-2">
            <p class="card-text">
              <span class="badge badge-soft-secondary">
                粉丝:{{$user->fans->count()}}
              </span>
              <span class="badge badge-soft-secondary">
                关注:{{$user->following->count()}}
              </span>
            </p>
            @can('isMine',$user)
            <div class="nav flex-column nav-pills ">
                <a href="{{route('member.user.edit',[$user,'type'=>'icon'])}}" class="nav-link text-muted {{active_class(if_route(['member.user.edit']) && if_query('type', 'icon'), 'active', '')}}">
                    修改头像
                </a>
            </div>

            <div class="nav flex-column nav-pills ">
                <a href="{{route('member.user.edit',[$user,'type'=>'password'])}}" class="nav-link text-muted {{active_class(if_route(['member.user.edit']) && if_query('type', 'password'), 'active', '')}}">
                    修改密码
                </a>
            </div>
            <div class="nav flex-column nav-pills ">
                <a href="{{route('member.user.edit',[$user,'type'=>'name'])}}" class="nav-link text-muted  {{active_class(if_route(['member.user.edit']) && if_query('type', 'name'), 'active', '')}}">
                    修改昵称
                </a>
            </div>
            <div class="nav flex-column nav-pills ">
                <a href="{{route('member.notify',$user)}}" class="nav-link text-muted {{active_class(if_route(['member.notify']) , 'active', '')}}">
                    我的通知
                </a>
            </div>
            @endcan()

        </div>
    </div>
    <div class="card">
        <div class="card-body text-center">
            <div class="nav flex-column nav-pills ">
                <a href="{{route('member.my_fans',$user)}}" class="nav-link text-muted {{active_class(if_route(['member.my_fans']), 'active', '')}}">
                    @can('isMine',$user)
                    我的粉丝
                    @else
                    他的粉丝
                    @endcan
                </a>
                <a href="{{route('member.my_following',$user)}}" class="nav-link text-muted  {{active_class(if_route(['member.my_following']), 'active', '')}}">
                    @can('isMine',$user)
                    我的关注
                    @else
                    他的关注
                    @endcan
                </a>
                <a href="{{route('member.my_zan',[$user,'type'=>'article'])}}" class="nav-link text-muted {{active_class(if_route(['member.my_zan']), 'active', '')}}">
                    @can('isMine',$user)
                    我的点赞
                    @else
                    他的点赞
                    @endcan
                </a>
                {{--<a href="{{route('member.my_collect',$user)}}" class="nav-link text-muted  {{active_class(if_route(['member.my_collect']), 'active', '')}}">--}}
                    {{--@can('isMine',$user)--}}
                        {{--我的收藏--}}
                    {{--@else--}}
                        {{--他的收藏--}}
                    {{--@endcan--}}
                {{--</a>--}}
            </div>
        </div>
    </div>
</div>
@push('css')
    <style>
        #left_menu .active{
            color:white!important;
        }
    </style>
@endpush
<?php

namespace App\Http\Controllers\Member;

use App\Models\Article;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',[
            'only'=>['edit','update','attention']
        ]);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        //dd($user->toArray()); 当前用户浏览文章的作者
        //where('文章中的作者字段'等于当前用户浏览文章的作者)
        $articles = Article::latest()->where('user_id', $user['id'])->paginate(
            10
        );

        return view('member.user.show', compact('user', 'articles'));
    }


    public function edit(User $user, Request $request)
    {
        //调用策略
        $this->authorize('isMine', $user);
        //type 自定义的类似于get参数
        $type = $request->query('type');

        //dd($user->toArray());当前用户所浏览的文章作者信息
        return view('member.user.edit_'.$type, compact('user'));
    }

    //编辑
    public function update(Request $request, User $user)
    {
        //调用策略
        $this->authorize('isMine', $user);
        $data = $request->all();
        $this->validate(
            $request,
            [
                //sometimes 点那个就验证那个，不会因为密码没输入，昵称就不能通过
                'password' => 'sometimes|required|min:3|confirmed',
                'name' => 'sometimes|required',
            ],
            [
                'password.required' => '请输入密码',
                'password.min' => '密码不得小于3位',
                'password.confirmed' => '两次密码不一致',
                'name.required' => '请输入昵称',
            ]
        );
        //密码加密
        if ($request->password) {
            $data['password'] = bcrypt($data['password']);
        }
        //执行更新
        $user->update($data);

        return back()->with('success', '操作成功');
    }

    //关注取消关注
    public function attention(User $user)
    {
        //dd($user->toArray());  //$user我们自己定义的必须跟路由参数一致。指的是被关注者
        //$aa= $user->fans();
        //dd($aa->toggle(auth()->user()));
        $this->authorize('isNotMine',$user);
        $user->fans()->toggle(auth()->user());
        return back();
    }
    //我的粉丝 这里的我指的是文章作者，即$user
    public function myFans(User $user){
        //查询我的粉丝
        $fans=$user->fans()->paginate(10);
        //dd($fans->get()->toArray());
        return view('member.user.my_fans',compact('user','fans'));
    }
    //我的关注 这里的我指的是文章作者，即$user
    public function myFollowing(User $user){
        //查询我的关注
        $followings=$user->following()->paginate(10);

        return view('member.user.my_following',compact('user','followings'));
    }
     public function myCollect(User $user){

        //dd($user->toArray());


        return view('member.user.my_collect',compact('user'));
     }
}

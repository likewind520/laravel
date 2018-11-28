<div class="card" id="app">
    <div class="card-body">
        <!-- Comments -->
        <div class="comment mb-3" v-for="v in comments" :id="'comment'+v.id">
            <div class="row">
                <div class="col-auto">
                    <!-- Avatar -->

                    <a class="avatar" href="">
                        <img :src="v.user.icon" alt="..." class="avatar-img rounded-circle">
                    </a>
                </div>
                <div class="col ml--2">
                    <!-- Body -->
                    <div class="comment-body">
                        <div class="row">
                            <div class="col">
                                <!-- Title -->
                                <h5 class="comment-title">
                                    @{{v.user.name}}
                                </h5>
                            </div>
                            <div class="col-auto">
                                <!-- Time -->
                                <time class="comment-time">
                                    <a href="" @click.prevent="zan(v)" class="text-muted">👍 @{{v.zan_num}} </a>
                                    | @{{v.created_at}}
                                </time>
                            </div>
                        </div> <!-- / .row -->
                        <!-- Text -->
                        <p class="comment-text" v-html="v.content"></p>
                    </div>
                </div>
            </div> <!-- / .row -->
        </div>
        <!-- Divider -->
        <hr>
        <!-- Form -->
        @auth()
        <div id="editormd">
            <textarea style="display:none;"></textarea>
        </div>
        {{--.prevent 放在a标签阻止刷新页面并跳转，  放在按钮里面禁止发送请求--}}
        <button class="btn btn-primary" @click.prevent="send()">发表评论</button>
        @else
        <p class="text-muted text-center">请 <a href="{{route('login',['from'=>url()->full()])}}">登录</a> 后评论</p>
        @endauth
    </div>
</div>
@push('js')
    <script>
        require(['hdjs','vue','axios', 'MarkdownIt', 'marked', 'highlight'],function(hdjs,Vue, axios, MarkdownIt, marked) {
           var vm= new Vue({
                el: '#app',
                data: {
                        comment:{content:''},
                        comments:[], //所有评论
                },
               updated(){
                   $(document).ready(function () {
                       $('pre code').each(function (i, block) {
                           hljs.highlightBlock(block);
                       });
                   });
                   //滚动页面
                    //alert(location.hash);//#comment19
                   //http://demos.flesler.com/jquery/scrollTo/
                   hdjs.scrollTo('body',location.hash,1000, {queue:true});
               },
                methods: {
                    send(){
                        //评论不能为空
                        if (this.comment.content.trim() == '') {
                            hdjs.swal({
                                text: "请输入评论内容",
                                button: false,
                                icon: 'warning'
                            });
                            return false;
                        }
                        //axios.post('数据传输地址',{评论内容,评论谁的文章}).then((response=>{}))
                           //将数据传到PHP,.then成功后的回应
                        axios.post('{{route('home.comment.store')}}',
                            {
                            //内容名:值
                             content:this.comment.content,
                            //该文章
                             article_id:'{{$article['id']}}'
                            })
                            .then((response)=> {
                               // console.log(response);
                                //向所有评论数据数组里面追加新写入的内容
                                this.comments.push(response.data.comment);
                                //console.log(this.comments)
                                //将 markdown 转为 html,将标签解析在页面上
                                let md = new MarkdownIt();
                                response.data.comment.content = md.render(response.data.comment.content)
                                //清空 vue 数据
                                this.comment.content = '';
                                //清空编辑器内容
                                //选中所有内容
                                editormd.setSelection({line:0, ch:0}, {line:9999999, ch:9999999});
                                //将选中文本替换成空字符串
                                editormd.replaceSelection("");

                            })
                    },
                    //点赞
                    zan(v){
                        let url = '/home/zan/make?type=comment&id='+v.id;
                        axios.get(url).then((response)=>{
                            //console.log(response.data.num);
                            v.zan_num = response.data.zan_num;
                            //console.log(v);
                        })
                    }
                },
                mounted () {
                    //渲染编辑器
                    hdjs.editormd("editormd", {
                        width: '100%',
                        height: 300,
                        toolbarIcons: function () {
                            return [
                                "undo", "redo", "|",
                                "bold", "del", "italic", "quote", "|",
                                "list-ul", "list-ol", "hr", "|",
                                "link", "hdimage", "code-block", "|",
                                "watch", "preview", "fullscreen"
                            ]
                        },
                        //后台上传地址，默认为 hdjs配置项window.hdjs.uploader
                        server: '',
                        //editor.md库位置
                        path: "{{asset('org/hdjs')}}/package/editor.md/lib/",
                        //监听编辑器的变化
                        onchange: function () {
                            //给 vu 对象中 comment 属性中 content 设置值
                            vm.$set(vm.comment, 'content', this.getValue());
                        }
                    });
                    //请求当前文章的所有评论'article_id'=>$article['id']])}}'
                    axios.get('{{route('home.comment.index',['article_id'=>$article['id']])}}')
                        .then((response)=>{
                            this.comments = response.data.comments;
                            let md = new MarkdownIt();
                            //console.log(this.comments);
                            this.comments.forEach((v, k) => {
                                v.content = md.render(v.content)
                            })
                        })
                }
            })
        })
    </script>

@endpush
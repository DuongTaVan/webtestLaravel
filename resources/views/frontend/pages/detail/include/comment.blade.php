<div class="row style_comment">
    <div class="col-md-2">
        <img width="100%" src="source/icons/user.png" alt="">
    </div>
    <div class="col-md-10">
        <p style="color: green">{{$comment->user->name}}</p>
        <p>{{$comment->created_at}}</p>
        <p>{{$comment->cmt_content}}</p>
    </div>
</div>

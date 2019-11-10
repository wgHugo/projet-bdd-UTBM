
@foreach($comments as $comment)
<div class="display-comment" @if($comment->product_id != null) style="margin-left:40px;" @endif>
    <strong>{{ $comment->user->name }}</strong>
    <p>{{ $comment->content }}</p>
    <a href="" id="reply"></a>
</div>
@endforeach

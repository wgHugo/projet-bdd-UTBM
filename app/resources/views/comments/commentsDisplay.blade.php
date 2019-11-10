
@foreach($comments as $comment)
<hr/>
<div class="review-block">
    <div class="row">
        <div class="col-sm-3">
            <div class="review-block-name"><a href="#">{{$comment->user->name}}</a></div>
            <div class="review-block-date">{{ $comment->created_at->format('d M Y')}}<br/>{{ $comment->created_at->format('H:i')}}</div>
        </div>
        <div class="col-sm-9">
            <div class="review-block-rate">
                @for ($i = 0; $i < 5; $i++)
                <i class="fa fa-star{{ $comment->mark <=$i?'-o':'' }}" style="color: orange; font-size: 20px" aria-hidden="true"></i>

                @endfor
            </div>
            <div class="review-block-title"><strong>{{$comment->title}}</strong></div>
            <div class="review-block-description">{{$comment->content}}</div>
        </div>
    </div>
@endforeach

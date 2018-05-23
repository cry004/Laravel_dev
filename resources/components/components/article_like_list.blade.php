@if(!($users->isEmpty()))
<div class="LikeUserList hidden">
    <div class="ListContentBox">
        <div class="listtitle">この記事をオススメするスタイリスト</div>
        <div class="closer">✕</div>
        <div class="ListInnerBox">
            <ul class="StylistRecommend listcontent">
                @foreach($users as $user)
                <li class="StylistRecommend-Item2">
                    <a href="{{ $user->getProfileURL() }}">
                        <figure>
                            <img src="{{ $user->getIconImage() }}" height="40" class="round-image" onerror="this.src='https://hair.cm/images/users-icon-default.jpg';">
                            <figcaption>
                                <span class="StylistRecommend-Name text-ellipsis">{{$user->nickname}}</span>
                                <span class="StylistRecommend=Salon text-ellipsis">{{$user->shop_name}}</span>
                            </figcaption>
                        </figure>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
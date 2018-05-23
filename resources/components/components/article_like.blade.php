@if(!($users->isEmpty()))
<div class="NewsLikeUser">
    <div class="LikeUserTitle">この記事をオススメするスタイリスト
    </div>
    @foreach($users as $user)
        <div class="UserImage Usermore">
            <a href="{{ $user->getProfileURL() }}">
                <img src="{{ $user->getIconImage() }}" width="36" height="36" onerror="this.src='https://hair.cm/images/users-icon-default.jpg';">
            </a>
        </div>
    @endforeach
        <div class="UserImage  USermore">
            <img src="/images/Bg.jpg" width="36" height="36">
        </div>
</div>
@endif
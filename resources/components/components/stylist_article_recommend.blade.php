<div class="NewsStats">
@foreach($users as $user)
    <a href="{{ $user->getProfileURL() }}">
        <img src="{{ $user->getIconImage() }}" width="64" class="Snap-Avatar round-image">
    </a>
@endforeach
</div>

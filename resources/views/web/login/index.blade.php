@extends('web.global-web')

@section('page')
<h2>ログイン</h2>
@if ( count($errors) > 0 )
<div class="H-Notice Error">
@foreach ( $errors->all() as $error )
<p class="H-Message">{{ $error }}</p>
@endforeach
</div>
@elseif ( $loginError )
<div class="H-Notice Error">
<p class="H-Message">{{ $loginError }}</p>
</div>
@endif
{!! Form::open(["url" => AppUrl::to("web/login"), "method" => "POST"]) !!}
<div class="H-Form-Group">
    <label class="H-Form-Label">メールアドレス</label>
    {!! Form::text("email", old("email"), ["class" => "H-Form-Input"]) !!}
</div>
<div class="H-Form-Group">
    <label class="H-Form-Label">パスワード</label>
    {!! Form::password("password", ["class" => "H-Form-Input"]) !!}
</div>
<div class="H-Action-Group">
    {!! Form::submit("ログイン", ["class" => "H-Button"]) !!}
</div>
{!! Form::close() !!}

<div class="H-Section">
    <div class="H-Action-Group">
        <a href="{{ AppUrl::to('web/password/reset') }}" class="H-Button Guide">パスワードを忘れた方はこちら</a>
    </div>
</div>
@if ( $isShowRegisterButton )
<div class="H-Action-Group">
    <a href="{{ AppUrl::to('web/register') }}" class="H-Button Guide">新規登録はこちら</a>
</div>
@endif
@endsection

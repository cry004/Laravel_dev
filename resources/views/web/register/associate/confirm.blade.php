@extends('web.global-web')

@section('page')
<h2>メールアドレス連携</h2>
<p class="H-Caption">入力内容を確認して送信してください。</p>
<div class="H-Form-Group">
    <label class="H-Form-Label">メールアドレス</label>
    <p class="H-Form-Input">{{ $input["email"] }}</p>
</div>
<div class="H-Form-Group">
    <label class="H-Form-Label">パスワード</label>
    <p class="H-Form-Input">非表示</p>
</div>
<div class="H-Action-Group">
    {!! Form::open(["url" => AppUrl::to("web/register/associatemodify"), "method" => "POST"]) !!}
    @foreach ( $input as $key => $value )
    {!! Form::hidden($key, $value) !!}
    @endforeach
    {!! Form::submit("修正", ["class" => "H-Button Guide"]) !!}
    {!! Form::close() !!}

    {!! Form::open(["url" => AppUrl::to("web/register/doassociate"), "method" => "POST"]) !!}
    @foreach ( $input as $key => $value )
    {!! Form::hidden($key, $value) !!}
    @endforeach
    {!! Form::submit("送信", ["class" => "H-Button"]) !!}
    {!! Form::close() !!}
</div>
@endsection

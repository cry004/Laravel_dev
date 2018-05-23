@extends('web.global-web')

@section('page')
<h2>パスワード再発行</h2>
<p class="H-Caption">入力内容を確認して送信してください。</p>
<div class="H-Form-Group">
    <label class="H-Form-Label">新しいパスワード</label>
    <p class="H-Form-Input">{{ $input["password"] }}</p>
</div>
<div class="H-Action-Group">
    {!! Form::open(["url" => AppUrl::to("web/password_reset/edit"), "method" => "POST"]) !!}
    @foreach ( $input as $key => $value )
    {!! Form::hidden($key, $value) !!}
    @endforeach
    {!! Form::submit("修正", ["class" => "H-Button"]) !!}
    {!! Form::close() !!}

    {!! Form::open(["url" => AppUrl::to("web/password_reset/process"), "method" => "POST"]) !!}
    @foreach ( $input as $key => $value )
    {!! Form::hidden($key, $value) !!}
    @endforeach
    {!! Form::submit("送信", ["class" => "H-Button"]) !!}
    {!! Form::close() !!}
</div>
@endsection

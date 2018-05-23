@extends('globalAdminPage')

@section('head')
    <script src="{{asset('/js/tinymce/tinymce.min.js')}}"></script>
    <!--
    sample plugin as inject photo
    -->
    <script>
        tinymce.init({
            selector:'#content',
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons jbimages',
            toolbar3: 'filemanager',
            image_advtab: true,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools filemanager jbimages',
            ],
            height: 500,
            relative_url: false,
            external_filemanager_path:"/js/tinymce/plugins/filemanager/",
            filemanager_title        :"Respve File Manager" , // bisa diganti terserah anda
            external_plugins         : { "filemanager" : "plugins/filemanager/plugin.min.js"}
            /**/
        });
    </script>
@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>新規投稿を追加</h1>
    <form method="post" action="/edit/store">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="col-md-8">
                <div class="article-post">
                    {!! Form::text('title', null,['placeholder'  =>  "ここにタイトルを入力してください",'id'=>'title','class'=>'article-post--title']) !!}
                    {!! Form::text('excerpt', null, ['placeholder'  =>  "ここに抜粋を入力してください"]) !!}
                    {!! Form::text('content', $article->content, ['id'  =>  'content','class'=>'article-post--content']) !!}
                </div>
            </div>
            <div class="col-md-4">
                {!! Form::label('noindex','noindex : ') !!}
                {!! Form::checkbox('noindex', false, null, ['']) !!}
                {!! Form::label('nofollow','nofollow : ') !!}
                {!! Form::checkbox('nofollow', false, null, ['']) !!}

                <input type="submit" value="公開">
                <input type="submit" value="下書き">
            </div>
        </div>
    </form>
        <!--
            <label>タグ選択</label>
            <input type="text" name="tag" value="">
        -->
        <!--
            <label>アイキャッチ画像</label>
            <input type="text" name="nofollow" value="">
        -->
        <!-- tagの排出 -->

<style>
    .article-post{
    }
    .article-post--title{
        width:100%;
    }
</style>
@endsection
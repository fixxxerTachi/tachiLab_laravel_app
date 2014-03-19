@extends('articles.layout')
@section('content')
<h2>記事の追加</h2>
{{Form::open()}}
<table cellpadding='0' cellspacing='0'>
<tr><th>{{Form::label('title','タイトル')}}</th><td>{{Form::text('title')}}</td></tr>
<tr><th>{{Form::label('content','内容')}}</th><td>{{Form::textarea('content',null,array('cols'=>'80','rows'=>'40'))}}</td></tr>
<tr><th>{{Form::label('category','カテゴリ')}}</th><td>{{Form::select('category',Category::show_list())}}</td></tr>
<tr><th>{{Form::label('tag','タグ')}}</th><td>{{Form::text('tag')}}</td></tr>
<tr><th></th><td>{{Form::submit('投稿する')}}</td></tr>
</table>
{{Form::close()}}
@stop
@section('css')
<link rel='stylesheet' href='css/index.css' type='text/css'>
@stop

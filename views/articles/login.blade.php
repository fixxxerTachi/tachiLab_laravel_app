@extends('articles.layout')
@section('content')
{{Form::open()}}
<table cellpadding='0' cellspacing='0'>
<tr><th>{{Form::label('username','お名前')}}</th><td>{{Form::text('username')}}</td></tr>
<tr><th>{{Form::label('password','パスワード')}}</th><td>{{Form::password('password')}}</td></tr>
<tr><th></th><td>{{Form::submit('ログイン')}}</td></tr>
</table>
{{Form::close()}}
@stop

@section('css')
	<link rel='stylesheet' href='css/index.css' type='text/css'>
@stop

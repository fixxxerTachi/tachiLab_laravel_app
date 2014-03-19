@extends('articles.layout')
@section('content')
<h2>記事の編集<h2>
<ul>
	@foreach($articles as $a)
	<table cellpadding='0' cellspacing='0'>
		<tr>
			<td width='50px'>{{link_to('edit_article?id=' . $a->id,$a->id)}}</td>
			<td width='500px'>{{$a->title}}</td>
			<td>{{link_to('edit_article?del_id=' . $a->id,'削除')}}</td>
		</tr>
	</table>
	@endforeach
</ul>
@stop

@section('css')
<link rel='stylesheet' href='css/index.css' type='text/css'>
@stop

@extends('articles.layout')
@section('content')
	{{$links}}
	@foreach($articles as $article)
		<div class='article'>
			<h2>{{$article->title}}</h2>
			<div class='content'>
				{{nl2br(str_replace('div','p',$article->contents))}}
			</div>
		</div>
		<div class='article_footer'>
			<?php $date=new DateTime($article->created_at);?>
			<p>category:{{$article->category['name']}}&nbsp;&nbsp;|&nbsp;&nbsp;投稿日:{{$date->format('Y-m-d')}}</p>
		</div>
	@endforeach
	{{$links}}
@stop

@section('css')
<link rel='stylesheet' href='css/index.css' type='text/css'>
@stop

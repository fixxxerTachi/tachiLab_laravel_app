<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<title>@yield('title')</title>
<link rel='stylesheet' href='css/common.css' type='text/css'>
@section('css')
@show
</head>
<body>
<div id='container'>
	<div id='main'>
		@yield('content')
	</div>

	<div id='left_side'>
		<div class='side_category'>
			<h2>Search Articles</h2>
			<form method='get'>
			<p><input type='text' name='keyword'><input type='submit' value='検索'></p>
		</div>
		<div class='side_category'>
			<h2>Category List</h2>
			<ul id='category'>
				@foreach(Category::lists('name','id') as $key=>$category)
					<li>{{link_to('/?category=' . $key,$category)}}</li>
				@endforeach
			</ul>
		</div>

		<div class='side_category'>
			<h2>tags</h2>
			<ul id='tag'>
			@foreach(Article::tag_lists() as $tag)
				<li>{{link_to('/?tag=' . $tag,$tag)}}</li>
			@endforeach
			</ul>
		</div>
	</div><!-- end:left_side -->
</div><!-- end:container-->
</body>
</html>

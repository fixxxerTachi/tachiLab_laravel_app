<?php
class ArticlesController extends BaseController
{
	public function index()
	{
		$articles=Article::with('category')->orderBy('id','desc')->paginate(3);
		$links=$articles->links();
		if(Input::has('category'))
		{
			$category_id=Input::get('category','');
			$articles=Article::where('category_id',$category_id)->orderBy('id','desc')->paginate(3);
			$links=$articles->appends(array('category'=>$category_id))->links();
		}
		if(Input::has('keyword'))
		{
			$keyword=Input::get('keyword','');
			$articles=Article::where('title','like','%' . $keyword . '%')->orWhere('contents','like','%' . $keyword . '%')
				->orderBy('id','desc')->paginate(3);
			$links=$articles->appends(array('keyword'=>$keyword))->links();
		}
		if(Input::has('tag'))
		{
			$tag=Input::get('tag');
			$articles=Article::where('tag','like','%' . $tag . '%')->orderBy('id','desc')->paginate(3);
			$links=$articles->appends(array('tag'=>$tag))->links();
		}
		return View::make('articles.index')->with('articles',$articles)->with('links',$links);
	}

	public function add_article()
	{
		if(Input::has('title') && Input::has('content'))
		{
			$article=new Article();
			$article->title=Input::get('title');
			$article->contents=Input::get('content');
			$article->category_id=Input::get('category');
			$article->tag=Input::get('tag');
			$article->created_at=date('Y-m-d H:i:s');
			$article->updated_at=date('Y-m-d H:i:s');
			$article->save();
			return Redirect::action('ArticlesController@index');
		}
		return View::make('articles.add_article');
	}

	public function edit_article()
	{
		if(Input::has('title') && Input::has('content'))
		{
			$article_id=Input::get('article_id');
			$article=Article::find($article_id);
			$article->title=Input::get('title');
			$article->contents=Input::get('content');
			$article->category_id=Input::get('category');
			$article->tag=Input::get('tag');
			$article->created_at=date('Y-m-d H:i:s');
			$article->updated_at=date('Y-m-d H:i:s');
			$article->save();
			return Redirect::action('ArticlesController@index');
		}

		if(Input::has('id'))
		{
			$article_id=Input::get('id','');
			if(empty($article_id) && !numeric($article_id))
			{
				return App::abort(404);
			}
			$article=Article::find($article_id);
			return View::make('articles.edit_form')->with('article',$article);
		}
		if(Input::get('del_id'))
		{
			$article_id=Input::get('del_id');
			Article::where('id',$article_id)->delete();
			return Redirect::action('ArticlesController@edit_article');
		}
		$articles=Article::orderBy('id','desc')->get();
		return View::make('articles.edit_article')->with('articles',$articles);
	}

	public function login()
	{
		if(Input::has('username') && Input::has('password'))
		{
			if(Auth::attempt(array('username'=>Input::get('username'),'password'=>Input::get('password'))))
			{
				return Redirect::intended('/');
			}
		}
		return View::make('articles.login');
	}
	public function logout()
	{
		Auth::logout();
		return Redirect::action('ArticlesController@index');
	}
}

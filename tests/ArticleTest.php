<?php
class ArticleTest extends TestCase
{
	public function test_show_tags()
	{
		$articles=DB::table('articles')->select('tag')->get();
		$tags=array();
		foreach($articles as $a){
			if(!empty($a->tag)){
				$tag=str_replace(array(',','、','　'),' ',$a->tag);
				$words=explode(' ',strtolower($tag));
				$tags=array_unique(array_merge($tags,$words));
			}
		}
		sort($tags);
		var_dump($tags);
	}
}

<?php
class Article extends Eloquent
{
	protected $table='articles';
	public function category()
	{
		return $this->belongsTo('Category','category_id');
	}

	public static function tag_lists()
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
		return $tags;
	
	}

}

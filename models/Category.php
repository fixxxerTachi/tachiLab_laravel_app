<?php
class Category extends Eloquent
{
	protected $table='categories';

	public function articles()
	{
		return $this->hasMany('articles');
	}

	public static function show_list()
	{
		$categories= self::all();
		foreach($categories as $c)
		{
			$lists[$c->id]=$c->name;
		}
		return $lists;
	}

}

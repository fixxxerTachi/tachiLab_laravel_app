<?php
class CategoroyTest extends TestCase
{
	public function testShowList()
	{
		$categories=Category::show_list();
		$this->assertArrayHasKey('1',$categories);
	}
	
}

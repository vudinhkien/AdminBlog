<?php

class IndexController extends LoginController {

	public function __construct(Department $dep) {
		$this->bangdepartment = $dep;
		$getData              = $dep->getDataDep();		
		View::share('getData',$getData);//như dùng global $getData truyền đi mọi view 
	}

	public function getFormIndex() {
		return View::make('content');
	}

	public function getIdDep($id) { //lấy tin tức theo id phòng ban
		$getNewsByDep = DB::table('news')
						  ->where('dep_id',$id)
						  ->where('hot',1)
						  ->limit(2)
						  ->get();	
		return View::make('newsbydep',compact('getNewsByDep'));
	}

	public function getIdNews($id) { //lấy tin tức theo id phòng ban
		$getNewsById = DB::table('news')
						  ->where('id',$id)
						  ->get();	
		return View::make('content',compact('getNewsById'));
	}
}
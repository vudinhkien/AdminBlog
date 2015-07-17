<?php 
class Department extends Eloquent{
	public $table      ="department";
	protected $primaryKey = 'dep_id';
	public $timestamps =false;

	public function getDataDep(){		///
		$a = DB::table('department')
			->orderBy('dep_id', 'desc')
			->limit(4)
			->get();
		if(!empty($a))
		{
			return $a;
		}
		else
		{
			echo "Khong co du lieu";
		}
	}

}
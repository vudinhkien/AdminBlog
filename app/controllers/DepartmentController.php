<?php

class DepartmentController extends LoginController {

	public function __construct(Department $dep) {
		$this->bangdepartment = $dep;
	}

	public function getDataAllWhere(){
		$depIt = $this->bangdepartment->where('id',1);
		$depMarket = $this->bangdepartment->where('id',2);
		$depChs = $this->bangdepartment->where('id',3);
		$depKh = $this->bangdepartment->where('id',4);
		return View::make('/content',compact('depIt','depMarket','depChs','depKh'));
	}
}
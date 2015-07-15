<?php

class CategoryController extends LoginController {

	public function __construct(Category $cat) {
		$this->bangcategory = $cat;
	}

	public function getEditCat($cat_id)
	{
		$edit = $this->bangcategory->find($cat_id);
		$cats = $this->bangcategory->buidDeQuyCat();
		return View::make('/admin/themcategory', compact('edit','cats'));
		//trả sang form 'Sửa' $edit mang dữ liệu của id đó
	}

	public function ThemCategory() {
		$rules = [ //điều kiện kiểm trả nhập trống
			'cat_name' => 'required',
			'position' => 'required',
		];

		$messages = [  //in ra thông báo ô trống
			'cat_name.required' => 'Vui lòng nhập tên danh mục',
			'position.required' => 'Còn vị trí thì sao',
		];

		$validator = Validator::make(Input::all(), $rules, $messages);//thực thi

		if($validator->passes()) {
			$cat_obj    = new Category();
			$getInputCat = Input::all();  //thay vì viết dài dòng như trên
			
			if($cat_obj->Insert_UpdateCat($getInputCat))
			{
				return Redirect::to("admin/listcat")->with('bao_thanh_cong', 'Thành Công');
			}
			else
			{
				return Redirect::back()->with('bao_loi', 'Thất Bại');
			}
		}else {			
			return Redirect::back()->withInput()->withErrors($validator);
		}
	}

	 

	/**
	 * Form them category
	 * 
	 * @return View
	 */
	public function getFormThemCategory() {

		$cats = $this->bangcategory->buidDeQuyCat();

		return View::make('/admin/themcategory',compact('cats'));
	}

	/**
	 * show danhsach cat
	 * 
	 * @return View
	 */
	public function getAllCat()// show toàn bộ dlieu trong 1 bảng
	{
		$sendCat = $this->bangcategory->getPaginated();
		return View::make('/admin/listcat', compact('sendCat'));	
	}   

	public function DeleteCat()
	{	
		$cat_obj 	=	new Category();
		$id = Input::All();

		if($cat_obj->DeleteCategory($id)){
			return Redirect::to('admin/listcat')->with('bao_thanh_cong', 'Xóa Thành Công');
		}
		else
		{
			return Redirect::back()->with('bao_loi', 'Xóa Thất Bại');
		}
	}
}//end class
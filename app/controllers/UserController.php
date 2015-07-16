<?php

class UserController extends LoginController {

	public function __construct(User $user) {
		$this->banguser = $user;
	}

	public function getFormIndex() {

		return View::make('/index');
	}
	/**
	 * Form login
	 * 
	 * @return View
	 */
	public function getFormLogin() {

		return View::make('/admin/login');
	}
	
	public function logOut() {
		//Auth::logout();
		Session::forget('userId');
		return View::make('/admin/login');
	}
	
	public function getFormProfile() {
		return View::make('/admin/profile');
	} 

	public function getIndex() {
		return View::make('/admin/index');
	}
	public function login(){
		// if(Input::has('rememberMe')) { check remember
  //      $lifetime = time() + 1440 * 60; // one day
  //      Config::set('session.lifetime', $lifetime);

		return User::testLogin(Input::get('email'), Input::get('password'));
	}

	public function getFormGioithieu() {
		return View::make('/admin/gioithieu');
	}

	public function getFormThemUser() {
		return View::make('/admin/dangky_sua_user');
	}
	/**
	 * show danhsach user
	 * 
	 * @return View
	 */
	public function getAllUser()// show toàn bộ dlieu trong 1 bảng
	{

		//phân 5 bản ghi 1 trang
		$sendUser= $this->banguser->getPaginated(5, Input::all());
		
		// trả về file showdanhsach.blade.php biến $sendUser 
		return View::make('/admin/listuser', compact('sendUser'));	
	} 
	/**
	 * dang ky user
	 * 
	 * @return View
	 */
	public function DangkyUser() {
		$rules = [ //điều kiện kiểm trả nhập trống
			'email' => 'required',
			'password' => 'required',
			'name' => 'required',
			'address'    => 'required',
		];

		$messages = [  //in ra thông báo ô trống
			'email.required' => 'Vui lòng nhập tài khoản theo định dạng email',
			'password.required' => 'Vui lòng nhập password',
			'name.required' => 'Vui lòng nhập tên',
			'address.required'    => 'Vui lòng nhập địa chỉ',
		];

		$validator = Validator::make(Input::all(), $rules, $messages);//thực thi

		if($validator->passes()) {
			$sv_obj    = new User();
			$getInputUser = Input::all();  //thay vì viết dài dòng như trên
			
			if($sv_obj->Insert_UpdateUser($getInputUser))
			{
				return Redirect::to('admin/showuser')->with('bao_thanh_cong', 'Thành Công');
			}
			else
			{
				return Redirect::back()->with('bao_loi', 'Thất Bại');
			}
		}else {			
			return Redirect::back()->withInput()->withErrors($validator);
		}
	}

	public function getEdit($id)
	{
		$edit = $this->banguser->find($id);
		return View::make('/admin/dangky_sua_user', compact('edit'));
		//trả sang form 'Sửa' $edit mang dữ liệu của id đó
	}

	public function DeleteUser()
	{
		$user_obj 	=	new User();
		$id = Input::get('id');
		if($user_obj->DeleteUser($id)){
			return Redirect::to('admin/showuser')->with('bao_thanh_cong', 'Xóa Thành Công');
		}
		else
		{
			return Redirect::back()->with('bao_loi', 'Xóa Thất Bại');
		}
	}
}
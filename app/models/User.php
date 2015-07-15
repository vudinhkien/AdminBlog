<?php 
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	
	use UserTrait, RemindableTrait;

	public $table="users";

	public $timestamps=false;

	/**
	 * thuc thi insert - update
	 * 
	 * @return controller
	 */
	public function Insert_UpdateUser($data)
	{	
		$id = Input::get("id");
		if(!($id)){
			$user  = new User;
		}else{
			$user = User::find(array_get($data, 'id'));		//tìm id đã có trong data	
		}
		$user->email    = array_get($data, 'email');
		$user->password = Hash::make(array_get($data, 'password'));
		$user->name     = array_get($data, 'name');
		$user->address  = array_get($data, 'address');
		return $user->save();
	}

	public function DeleteUser($id)
	{
		return $this->where('id',$id)->first()->delete();
	}

	/**
	 * kiem tra login
	 * 
	 * @return controller
	 */
	public static function testLogin($email, $password) {
		$formUser = array(
			'email'    => $email,
			'password' => $password
		);

		$rules = array(
			'email'    => "required",
			'password' => 'required'
		);

		$messages = array(
			'email.required'    => "Vui long nhap email",
			'email.email'       => 'Vui long nhap dung dinh dang email',
			'password.required' => 'Vui long nhap mat khau'
		);

		$validator = Validator::make($formUser, $rules, $messages);

		if($validator->fails()) {
			// Tra ve thong bao cho nguoi
			return Redirect::back()->withInput()->withErrors($validator);
		}			
		else {
			// Vao db lay thong tin, so sanh neu ok thi dang nhap, k ok thi lại thong bao cho nguoi dung
		   if(Auth::attempt($formUser)) {//bắt buộc để so sánh với email csdl
		   	// Redirect sang danh sach sinh vien
				Session::set("userId", Auth::user()->id);

		   	return Redirect::to('admin/index');
		   } else {
		   	return Redirect::back()->withInput()->with('error', 'Email hoặc mật khẩu không chính xác');
		   }
		}					
	}
	/**
	 * thuc thi search
	 * 
	 * @return controller
	 */
	public function getPaginated($limit = 25, array $receiveArray = array()) {
	$keyword = array_get($receiveArray, 'keyword');		

	$query = User::whereRaw(1);// tương đương với select * from sinhvien

	if($keyword) {
		$query->where('email', 'LIKE', '%'. $keyword .'%')
				->orWhere('name', 'LIKE', '%'. $keyword .'%');			      
	}
		return $query->paginate($limit);
	}
}//end class User
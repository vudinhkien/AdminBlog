<?php

class NewsController extends LoginController {

	public function __construct(News $news) {
		$this->bangnews = $news;
	}

	public function getFormThemBaiviet() {

		$cats = DB::table('category_news')
				->get();
		$edit = new Stdclass; //khởi tạo 1 mảng rỗng để truyền sang form 2 biến
		$edit->title = '';
		$edit->id = '';
		$edit->images = '';
		$edit->tomtat = '';
		$edit->cat_id = '';
		$edit->content = '';

		return View::make('/admin/thembaiviet',compact('cats', 'edit'));
	}
	public function getEditNews($id)
	{
		$cats = DB::table('category_news')
				->get();
		$edit = $this->bangnews->find($id);	
		return View::make('/admin/thembaiviet', compact('edit', 'cats'));
	}


	/**
	 * Lấy tất cả dữ liệu 
	 * 
	 * @return đổ sang listnews để show
	*/
	public function getAllDataNews()// show toàn bộ dlieu trong 1 bảng
	{
		//phân 5 bản ghi 1 trang
		$sendAllDataNews= $this->bangnews->getPaginated(3, Input::all());												
		// trả về file showdanhsach.blade.php biến $sendUser 
		return View::make('/admin/listnews', compact('sendAllDataNews'));	
	} 

	/**
	 * Form them category
	 * 
	 * @return View
	 */
	public function getFormThemCategory() {
		return View::make('/admin/themcategory');
	}

	public function ThemBaiviet() {
		$rules = [ //điều kiện kiểm trả nhập trống
			'title' => 'required',
			'tomtat' => 'required',
			'content'    => 'required',
		];

		$messages = [  //in ra thông báo ô trống
			'title.required' => 'Tiêu đề chưa nhập',
			'tomtat.required' => 'Tóm tắt nội dung bài viết chưa nhập',
			'content.required' => 'Nội dung bài viết chưa nhập',
		];

		$validator = Validator::make(Input::all(), $rules, $messages);//thực thi
		
		if($validator->passes()) {
			$news_obj    = new News();
			$getInputNews = Input::all();
			
			if($news_obj->Insert_UpdateNews($getInputNews))
			{
				return Redirect::to('admin/listnews')->with('bao_thanh_cong', 'Thành Công');
			}
			else
			{
				return Redirect::back()->with('bao_loi', 'Thất Bại');
			}
		}else {			
			return Redirect::back()->withInput()->withErrors($validator);
		}
	}

	public function DeleteNews()
	{
		$news_obj 	=	new News();
		$id = Input::get('id');
		if($news_obj->DeleteNews($id)){
			return Redirect::to('admin/listnews')->with('bao_thanh_cong', 'Xóa Thành Công');
		}
		else
		{
			return Redirect::back()->with('bao_loi', 'Xóa Thất Bại');
		}
	}

	/**
	 * Form show record
	 * 
	 * @return dashboard
	 */
	public function getDashboard() {
		$getAllRecordNews= $this->bangnews;
		$getAllRecordHot= $this->bangnews->where('hot',1);
		$getAllRecordThuong= $this->bangnews->where('hot',1);
		return View::make('/admin/dashboard', compact('getAllRecordNews','getAllRecordHot','getAllRecordThuong'));
		// 	$featured           = $getAllRecordNews->where('hot', '=', 0);
		// 	return View::make('/admin/dashboard', compact('getAllRecordNews'));
		// }
	}
}
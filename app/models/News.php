<?php 
class News extends Eloquent{
	public $table="news";
	public $timestamps= false;

	public function Insert_UpdateNews($data)
	{	
		$id = Input::get("id");
		if(!Input::has('id')){
			$news  = new News;
		}else{
			$news = News::find(array_get($data, 'id'));		//tìm id đã có trong data	
		}
		$news->title        = array_get($data, 'title');
		
		// Upload images 
		if(Input::file('file')) {
			define('PATH_CATEGORY_ICON', rtrim($_SERVER['DOCUMENT_ROOT'], '/'). '/upload/');
			$file               = array_get($data, 'file');
			$file->move(PATH_CATEGORY_ICON, $file->getClientOriginalName());
			$news->images       = $file->getClientOriginalName();
		}
		// End Upload images
		$news->tomtat      = array_get($data, 'tomtat');
		$news->content     = array_get($data, 'content');
		$news->cat_id      = array_get($data, 'cat_id');
		$news->dep_id      = array_get($data, 'dep_id');
		$news->hot         = array_get($data, 'hot');
		$news->ngaydangbai = date('Y-m-d H:i:s');
		return $news->save();
	}

	public function DeleteNews($id)
	{
		return $this->where('id',$id)->first()->delete();
	}

	public function getPaginated($limit = 125, array $receiveArray = array()) {
	$keyword = array_get($receiveArray, 'keyword');		
	$query = News::whereRaw(1)                     // tương đương với select * from sinhvien
			->join('category_news', 'news.cat_id', '=', 'category_news.cat_id')
			->join('department', 'news.dep_id', '=', 'department.dep_id');
		if($keyword) {
			$query->where('title', 'LIKE', '%'. $keyword .'%')
					->orWhere('content', 'LIKE', '%'. $keyword .'%');			      
		}
		return $query->paginate($limit);
	}
}

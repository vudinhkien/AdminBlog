<?php 
class Category extends Eloquent{
	public $table      ="category_news";
	protected $primaryKey = 'cat_id';
	public $timestamps =false;

	public function Insert_UpdateCat($data)
	{	
		$id = Input::get('id');
		if(!Input::has('id')){
			$cat  = new Category;
		}else{
			$cat = Category::find(array_get($data, 'id'));		//tìm id đã có trong data	
		}
		$cat->parent_id = array_get($data, 'parent_id');
		$cat->cat_name  = array_get($data, 'cat_name');
		$cat->position  = array_get($data, 'position');
		$cat->home      = array_get($data, 'home');
		return $cat->save();
	}

	public function buidDeQuyCat($parentid = 0, $space = "", $trees = array()){

		$cats = DB::table('category_news')->where('parent_id', $parentid)->get();
		foreach ($cats as $cat) {
			$trees[] = array('cat_id' => $cat->cat_id, 'cat_name'=> $space.$cat->cat_name); 
			$trees = $this->buidDeQuyCat($cat->cat_id, $space.'--&nbsp;', $trees);
		}
		return $trees;
	}//end Menu

	/**
	 * thuc thi
	 * 
	 * @return controller
	 */
	public function getPaginated($limit = 25) {
		return Category::paginate($limit);
	}

	public function DeleteCategory($cat_id)
	{
		return $this->where('cat_id',$cat_id)->first()->delete();
	}	 

}//end class
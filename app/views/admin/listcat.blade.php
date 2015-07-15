@extends('admin.index')
@section('content')
	<table class="table table-bordered table-striped table-condensed flip-content tableCat">
      <thead class="flip-content">
         <tr>
             <th>Category Name</th>
             <th width="10%" class="numeric">Thứ tự</th>
             <th width="5%" class="numeric">Sửa</th>
             <th width="5%" class="numeric">Xóa</th>
         </tr>
      </thead>

      <tbody>
			{{ listCatTable($sendCat) }}	
      </tbody>
   </table>
@endsection
<?php
function listCatTable($items,$space='', $parent = 0)
{
	//$menu_obj = new category();
   $table_html = '';
	if($parent==0){  
    	$space=''; }
		else{  
    	$space .="-&nbsp;";  
		}  

   foreach($items as $item)
   {
      if ($item['parent_id'] == $parent) {
			$table_html .= "<tr>";
			$table_html .= "<td>".$space.$item['cat_name'] ."</td>";    
			$table_html .= '<td class="numeric" align="center">'. $item['position']."</td>";
			$table_html .= ' <form action=" '.asset('admin/delete-cat').' " method="post">
        <td class="numeric">';
			$table_html .= "<a href=".route('sendIdCat',[$item->cat_id])." class='btn default btn-xs purple'><i class='fa fa-edit'></i>Sửa</a>
        </td>";
			$table_html .=  '<td class="numeric">
        <input type="hidden" name="id" value=" '.($item->cat_id).' " />
		    
        <input type="submit" value="Xóa" /></a></td>
            
        </form>
        </tr>';
			 
            $table_html .= listCatTable($items,$space, $item['cat_id']);                 
      }
   }
   return $table_html;
}

?>

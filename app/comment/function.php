<?php 

	function getname($id){
		if ($id==0) {
			return '顶级分类';
		}
		$info=DB::table('cate')->where('id','=',$id)->first();
		return $info->name;
	}
 ?>
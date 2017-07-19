<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class catecontroller extends Controller
{
    public function getAdd(){
       $cate=DB::table('cate')->get();
        return view('cate',['cate'=>$cate]);
    }
     public function postInsert(Request $request){
      //去除token字段
        $data=$request->except(['_token']);
      //判断是否顶级分类
        // var_dump($data['pid']);die();
        if ($data['pid']==0) {
        	# code...
        	$data['path']='0';
        }else{
        	//第一步获取当前父级id
        	$info=DB::table('cate')->where('id','=',$data['pid'])->first();
        	$data['path']=$info->path.','.$info->id;
        }
        $res=DB::table('cate')->insert($data);
        if ($res) {
        	return redirect('/cate/index');
        }
    }
    public function getIndex(){
    	$cate=DB::table('cate')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->orderBy('id')->get();
    	foreach ($cate as  $v) {
    		//判断当前分类的等级
    		$arr=explode(',', $v->path);
    		//计算等级长度，根据长度判断
    		$lerver=count($arr)-1;
    		// var_dump($lerver);
    		$v->name=str_repeat('|----------------', $lerver).$v->name;
    	}
    	// die();
    	// var_dump($cate);die();
    	return view('catelist',['cate'=>$cate]);
    	var_dump($cate);
    }
    public function getDelete(Request $request){
    	// echo 111;
    	$id=$request->id; 
    	$info=DB::table('cate')->where('id',$id)->first();
    	$path=$info->path.','.$info->id;
    	DB::table('cate')->where('path','like',$path.'%')->delete();
    	$res=DB::table('cate')->where('id',$id)->delete();
    	// var_dump($res);
    	if ($res) {
    		return back()->with('info','删除成功');
    	}else{
    		return back()->with('info','删除失败');
    	}
    }
    public function getDigui(){
    	$res=$this->getBydigui(0);
    	dd($res);
    }
    public function getBydigui($pid){
    	//你将pid给我我能将所有的为0的顶级分类拿到
    	//获取分类
    	$cate=DB::table('cate')->where('pid',$pid)->get();
    	//遍历分类信息
    	$sub_cate=[];
    	foreach ($cate as $k => $v) {
    		//这里是再将我自己下面的子级分类遍历出来一层一层实现
    		$v->sub_cate=$this->getBydigui($v->id);
    		$sub_cate[]=$v;
    	}
    	return $sub_cate;
    } 
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Mail;

use Storage;
class FileController extends Controller
{

      public function photos(){
          $res=DB::table('albums')->get();
         return view('photos',['res'=>$res]);
      }
      public function insertphotos(){
        return view('insertphotos');

      }
       public function doinsertphotos(Request $request){
           // var_dump($request->all());
                  $this->validate($request, [
                  'name' => 'required',
                  'info' => 'required',
                  'cover' => 'required',
              ]);
                  if ($request->hasFile('cover')) {
                    $suffix=$request->file('cover')->getClientOriginalExtension();
                    // var_dump($suffix);
                    $src=time().rand(0,99).'.'.$suffix;
                    $path='/filephotos';
                    $file=$path.'/'.$src;
                     $request->file('cover')->move('.'.$path,$src);
                     DB::table('albums')->insert(['name'=>$request->name,'intro'=>$request->info,'cover'=>$file]);
                     return redirect('/seephotos');
                  }
      }

      public function file(Request $request){
            $res=DB::table('photos')->where('ablum_id',$request->id)->get();
            // var_dump($res);die();
            return view('file',['id'=>$request->id,'res'=>$res]);
      }
      public function dofile(Request $request){
        // DB::table('file')->delete();
        if ( $request->hasFile('img')) {
            $data=[];
            foreach ($request->file('img')  as $key => $value) {
                // 获取后缀名
                $suffix=$value->getClientOriginalExtension();
                $dir='./upload/';
                $name=rand(0,100).time();
                $temp=[];
                // 执行上传
                $value->move($dir, $name.'.'.$suffix);
                $temp['src']=trim($dir,'.').$name.".".$suffix;
                $temp['ablum_id']=$request->id;
                $data[]=$temp;
            }
            $res = DB::table('photos')->insert($data);
             return redirect('/file?id='.$request->id);

        }
           
       
      }
      public function seefile(){
            $res=DB::table('file')->paginate(3);
            // var_dump($res);die;
            return view('see',['res'=>$res]);
      }

      public function email(){

         Mail::send('emails.reminder', [], function ($m)  {
            $m->from('zshizun@163.com ', 'a');

            $m->to('672464369@qq.com', 'a')->subject('用户注册激活邮件');
           });
      }
      public function ajax(){
          return view('ajaxfile');
      }

}

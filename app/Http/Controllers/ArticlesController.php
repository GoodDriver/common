<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use App\Article;
use App\User;
 
use Markdown; 
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


      public function __construct(){
        $this->middleware('auth');
         }

    public function getArticles()
    {
        // $res=User::where('id',1)->first()->name;
        $res=Article::get();
        // var_dump($res);die();
        foreach ($res as $key => $value) {
            $value->name=User::where('id',$value->uid)->first()->name;
        }
        // var_dump($res);die();
        return view('articles',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getInsert()
    {
        //
        return view('article');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postInsert(Request $request)
    {
        //
        // var_dump($_POST);
        $id=Auth::user()->id;
        // var_dump($id);
        $res=new Article();
        $res->uid=$id;
        $res->title=$request->title;
        $res->content=$request->content;
        $res->save();
        if ($res) {
            return redirect('/articles/articles');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getUpdate(Request $request)
    {
        $res=Article::where('id',$request->id)->first();
        // var_dump($res);
        return view('articleupdate',['res'=>$res]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request)
    {
        //
        // var_dump($request->all());die();
           $id=Auth::user()->id;
           $res=Article::where('id',$request->id)->first();
            $res->uid=$id;
            $res->title=$request->title;
            $res->content=$request->content;
            $res->save();
            if ($res) {
                return redirect('/articles/articles');
            }else{
                return back();
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDelete(Request $request)
    {
        //
        // var_dump($request->id);
             $res=Article::where('id',$request->id)->delete();
             // $res->delete();
             if ($res) {
                    return back()->with('info','删除成功');
             }else{
                return back()->with('info','删除失败');
             }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postYulan(Request $request)
    {
        //
         return Markdown::convertToHtml($request->content);
        // echo 1;
    }
}

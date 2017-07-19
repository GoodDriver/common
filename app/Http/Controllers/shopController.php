<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Cart;
class shopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        // echo '1';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Insert()
    {
        //
        // Cart::destroy();
        // Cart::add('293ad','风景一',1,9.99);
        // Cart::remove('bd3123c61aada8c02d206f5ecb5760bd');
        // $v=Cart::get('bd3123c61aada8c02d206f5ecb5760bd');
        // var_dump($v);die();
        // Cart::add(array(array('id'=>'293ad', 'name'=>'Product1','qty'=>1,'price'=>10.00),array('id'=>'4832k','name'=>'Product2','qty'=>1,'price'=>10.00,'options'=>array('size'=>'large'))));

        // $all=Cart::content();
       // $count= Cart::count();
       // var_dump($count);
        // $a=Cart::total();
        // var_dump($a);
        // $b=Cart::subtotal();
        // var_dump($b);
        // $c=Cart::tax();
        // var_dump($c);
        // var_dump($all);
        // Cart::update('8cbf215baa3b757e910e5305ab981172',1000);
        // $v=Cart::get('8cbf215baa3b757e910e5305ab981172');
        // var_dump($v);
        // var_dump($all);
        // foreach ($all as  $v) {
        //    Cart::update($v->rowId,100);
        //    var_dump($v);
        // }
        return view('shoplist');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function doinsert($id)
    {
        $products=[
            1=>['id'=>1,'name'=>'风景一','price'=>9.9,'des'=>'好风光'],
            2=>['id'=>2,'name'=>'风景二','price'=>19.9,'des'=>'江山如画'],
            3=>['id'=>3,'name'=>'风景三','price'=>29.9,'des'=>'大好河山'],
        ];
        $product=$products[$id];
        // Cart::destroy(); 
        Cart::add($product['id'],$product['name'],1,$product['price']);
        // var_dump($product);
       return redirect('buy');
    }
    public function buy(){
        $carts=Cart::content();
        $count=Cart::count();
        $total=Cart::subtotal();
        return view('shopbuy',['carts'=>$carts,'count'=>$count,'total'=>$total]);
        // echo '111';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del()
    {
        Cart::destroy();
        return redirect('/buy');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        Cart::remove($request->rowId);
         return redirect('/buy');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

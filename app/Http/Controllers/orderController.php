<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class orderController extends Controller
{
    
    function addtoCart($item){
        if(isset($_SESSION['cart'])){
            if(isset($item,$_SESSION['cart'][$item]))
                $_SESSION['cart'][$item]+=1;
            else
             $_SESSION['cart'][$item]=1;
        }else{
            
        }
        
    }
    
    function showCart(){
        return view('home.mycart');
    }
    
    function removeItem($item){
         if(isset($_SESSION['cart'])){
            if(isset($item,$_SESSION['cart'][$item]))
                unset($_SESSION['cart'][$item]);
        }
       return Redirect::to(url('cart'));
    }
}

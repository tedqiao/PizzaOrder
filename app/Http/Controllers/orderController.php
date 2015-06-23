<?php

namespace App\Http\Controllers;

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
        }
        if(sizeof($_SESSION['cart'])==0)
        return view('errors.noItems');
        return view('home.mycart');
        //return view('home.mycart');
    }
    
    function showCart(){
        if(sizeof($_SESSION['cart'])==0)
        return view('errors.noItems');
        return view('home.mycart');
    }
    
    function removeItem($item){
         if(isset($_SESSION['cart'])){
            if(isset($item,$_SESSION['cart'][$item]))
                unset($_SESSION['cart'][$item]);
        }
        return view('home.mycart');
    }
}

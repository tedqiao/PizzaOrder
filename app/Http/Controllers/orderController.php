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
        
    }
    
    function showCart(){
        return view('home.mycart');
    }
}

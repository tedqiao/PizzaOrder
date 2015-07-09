<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\items;
class orderController extends Controller
{
    
    function addtoCart($item){
        if(isset($_SESSION['cart'])){
            if(isset($item,$_SESSION['cart'][$item])){
                $_SESSION['cart'][$item]+=1;
                $_SESSION['total']+=items::getPrice($item);
            }
            else{
            $_SESSION['cart'][$item]=1;
            if(!isset( $_SESSION['total']))
            $_SESSION['total']=items::getPrice($item);
            else
            $_SESSION['total']+=items::getPrice($item);    
            }
        }
      
        //if(sizeof($_SESSION['cart'])==0)
        //return view('errors.noItems');
        return view('home.mycart');
        //return view('home.mycart');
    }
    
    function showCart(){
        if(!isset($_SESSION['auth'])){
            echo 'sry member only';
            return;
        }
        return view('home.home');
    }
    
    function removeItem($item){
         if(isset($_SESSION['cart'])){
            if(isset($item,$_SESSION['cart'][$item]))
                 $_SESSION['total']-=$_SESSION['cart'][$item]*items::getPrice($item);
                unset($_SESSION['cart'][$item]);
                if($_SESSION['total']<1)
                    unset($_SESSION['total']);
        }
        //if(sizeof($_SESSION['cart'])==0)
        //return view('errors.noItems');
        return view('home.mycart');
    }
    
    function placeOrder(){
       echo $_POST['optradio'];
        
    }
}

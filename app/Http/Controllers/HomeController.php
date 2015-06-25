<?php
namespace App\Http\Controllers;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Illuminate\Routing\Controller;
use App\items;
class HomeController extends Controller {

    function __construct() {
   
    }
    
    public function index(){
        
        return view('home.home');
    }
    
    public function menu(items $item){
        $item=$item->getItemsWithName('');
        return view('home.ships',['items'=>$item]);
        
    }

}

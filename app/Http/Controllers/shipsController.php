<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\items;
use App\file;
class shipsController extends Controller {

    public function show(items $items) {
        if (isset($_REQUEST['search']))
            $word = $_REQUEST['search'];
        $items = $items->getItemsWithName($word);
        return view('home.ships', ['items' => $items]);
    }

    public function additem() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $file=new file(); 
            $path = "img/". $_FILES["uploadimage"]["name"];
            $res_img=$file->upload($path,$_FILES["uploadimage"]["tmp_name"]);
            $res_name=items::check($_POST['iname']);
            if($res_name){
                items::add($_POST['iname'], $_POST['price'], $_POST['category'], $res_img===true?$path:"");
                $res=true;
            }
            return view('admin.addpage',['res'=>$res]);
        }
        
        return view('admin.addpage');
    }
    
    public function showWithCategory($item){
         $items = items::getItemsWithCategory($item);
        return view('home.ships', ['items' => $items,'category'=>$item]);
    }

}

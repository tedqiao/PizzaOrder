<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class items extends Model
{
    public function getItemsWithName($name){
        return DB::select("select * from items where iname like '%$name%'");
    }
    
    public static function getPrice($item){
        $p=DB::select("select price from items where iname='$item'");
        return $p[0]->price;
        
    }
     public static function add($name,$price,$category,$img){
         return DB::insert("insert into items(iname,price,category,img) value(?,?,?,?)",[$name,$price,$category,$img]);
     }
     
     public static function check($name){
         $res=DB::select("select count(*) as num from items where iname='$name'");
         if($res[0]->num!==0){
             return false;
         }else{
             return true;
         }
     }
    
     public static function getItemsWithCategory($name){
        return DB::select("select * from items where category='$name'");
    }
    
    public static function createOrder(){
        
    }
    
     public static function getOrderInfo(){
        
    }
    
    
    
}

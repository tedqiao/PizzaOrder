<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class items extends Model

{
    public function getItemsWithName($name){
        return DB::select("select * from ships where sname like '%$name%'");
    }
    
    public static function getPrice($item){
        return DB::select("select price from items where sname='$item'");
    }
}

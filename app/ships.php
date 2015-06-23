<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class ships extends Model
{
    public function getshipwithname($name){
        return DB::select("select * from ships where sname like '%$name%'");
    }
}

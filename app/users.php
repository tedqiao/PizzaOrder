<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
class users extends Model
{
    protected $table='users';
    //private $Name=filter_input(INPUT_POST,'Name');
   
    function validation(){
        $name=filter_input(INPUT_POST,'Name');
        $pwd=filter_input(INPUT_POST,'pwd');
        $email=filter_input(INPUT_POST,'Email');
           
        $res=DB::select("select count(*) as num from ".$this->table." where name='$name'");
        if($name==false||$pwd==false||$email==false){
            return 1;
        }else if($res[0]->num!==0){
            return 2;
        }else{
            DB::insert("insert into users(name,password,email) value (?,?,?)",[$name,$pwd,$email]);
            return 10;
        }
        
        
        function login_validation(){
            
        }
        
       
    }
}

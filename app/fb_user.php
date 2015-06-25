<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class fb_user extends Model {

    //

    private $id;
    private $email;
    private $photo;
    private $name;
    private $password;

    public function setID($id) {
        $this->id = $id;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setPwd($password) {
        $this->password = $password;
    }

    public function getID() {
        return $this->id;
    }
    
     public function getPhoto() {
        return $this->photo;
    }

    public function saveDB() {
        $res = DB::select('select count(*) as num from facebookusers where id=?', [$this->id]);
      
        if($res[0]->num!==0){
            //echo 'Your account is already created';
            return;
        }
       echo $res[0]->num;
        return DB::insert('insert into facebookusers (id, email, photo,name,password) '
                        . 'values (?, ?,?,?,?)', [$this->id, $this->email, $this->photo, $this->name, $this->password]);
    }
    
     public function getName() {
        return $this->name;
    }

    //$table->timestamps();
}

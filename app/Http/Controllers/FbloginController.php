<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use App\fb_user;
class FbloginController extends Controller {

    public function __construct() {
        $this->users=new fb_user();
        FacebookSession::setDefaultApplication('565708973567797', '044173d5d5966d02112c684ffd26c1da');
        $this->helper = new FacebookRedirectLoginHelper(url('login/fb/callback'));
        try {
            //echo 'asdf';
            //print_r ($this->helper);
            $this->session = $this->helper->getSessionFromRedirect();
        } catch (FacebookRequestException $ex) {
            echo ' When Facebook returns an error';
        } catch (\Exception $ex) {
            echo 'When validation fails or other local issues';
        }

        $this->loginUrl = $this->helper->getLoginUrl(array('scope' => 'email'));
    }

    public function login() {
        return Redirect::to($this->loginUrl);
    }
    
    public function logout(){
        echo 'you are in lougout';
        session_destroy();
        return Redirect::to(url('/'));
    }

    public function callback() {

        if ($this->session) {
            try {
                $user_profile = (new FacebookRequest(
                        $this->session, 'GET', '/me'
                        ))->execute()->getGraphObject(GraphUser::className());
                $user_photos = (new FacebookRequest(
                        $this->session, 'GET', '/me'
                        ))->execute()->getGraphObject(GraphUser::className());
                $this->users->setID($user_profile->getID());
                $this->users->setName($user_profile->getName());
                $this->users->setPhoto('http://graph.facebook.com/'.$user_profile->getID().'/picture');
                $this->users->setEmail($user_profile->getEmail());
                //$this->users->setID($user_profile->getID());
                //$this->users->setID($user_profile->getID());
                $this->users->saveDB();
                $_SESSION['auth']=true;
                $_SESSION['user']=serialize($this->users);
            } catch (FacebookRequestException $e) {
                echo "Exception occured, code: " . $e->getCode();
                echo " with message: " . $e->getMessage();
            }
            
            return Redirect::away(url());
        }
    }

}

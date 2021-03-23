<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersControllerr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
class Model {

    public $id;
    public $url;
    public $checkingthelogin = [0,[]];
    public $session;
    public $arr; 



    public function input(){
    $checkingthelogin2[0] = 1;

    $checkingthelogin = [0,[]];
    $siteusers =  DB::table('users')->get();
    $siteurls = DB::table('urls')->get();
    $email = $_GET["email"];
    $password = $_GET["password"];
    $id = 0;
    $link = [];

    for($i=0;$i<count($siteusers);$i++){

        if($email == $siteusers[$i] -> email && $password == $siteusers[$i] -> password){
            $checkingthelogin[0] = 1;
            $id = $i+1;        
        }

    }
    if ($checkingthelogin[0] ==1){
        for($i=0;$i<count($siteurls);$i++){
            if ($siteurls[$i]-> user_id == $id){
                //$id = $i;
                array_push($link,$siteurls[$i]);
            }  
        }
        if (count($link) == 1){
            if ($link[0] -> short_code == 0){
                $link = [];
            }
        }
    }
    $checkingthelogin[1] = $link;

    for($i=0,$a=0,$b=1;$i<count($checkingthelogin[1]); $i++,$a=$a+2,$b=$b+2){
    $session = session()->put('arr.' . $a, $checkingthelogin[1][$i]->url);
    $session = session()->put('arr.' . $b, $checkingthelogin[1][$i]->short_code);
    }
    $session = session()->put('id' , $id);

  
 
    return $checkingthelogin;
    }

   
    public $getlink = [1];



    public function getlink(){
        $url = $_GET["url"];
        $arr = session()->get('arr');
        $user_id = session()->get('id');

        $arr2 =['a','b','c', 1 , 2 ,3];

        $short_code = 'hhtp://localhost/';

        for($i=0;$i<4;$i++){
            $short_code = $short_code . $arr2[rand(0,5)];
        }

        $name = DB::table('urls')->where([['user_id', '=', $user_id], ])->value('name');
        
        

        if ($_GET["url"] != ""){
        if (empty($arr) == 1 ){

            $session = session()->put('arr.' . 0, $url);
            $session = session()->put('arr.' . 1, $short_code);
 
            DB::table('urls')->where([['user_id', '=', $user_id], ])->update(['url' => $url,'short_code'=> $short_code]);
 
        } else {

            $session = session()->put('arr.' . count($arr), $url);
            $session = session()->put('arr.' . (count($arr)+1), $short_code);
            DB::insert('insert into urls (name, user_id, url, short_code) values (?, ?, ?, ?)', [$name, $user_id, $url, $short_code]);

        }
        }
        $name = $_GET["url"] != "";
        return $name;

    }
    }

   $User = new Model;

    $checkingthelogin = $User -> checkingthelogin;
    $session = $User -> session;
    $id =  $User -> id;
    $arr = $User -> arr;
    $url = $User -> url;


    if(isset($_GET["Вход"])) {
        $checkingthelogin = $User -> input();
    }

     if(isset($_GET["add"])) {
         $url = $User -> getlink();

     }
     if(isset($_GET["exit"])) {
         $session = session()->flush();

     }

     $id = session()->get('id');
     $session = session()->all();
     $arr = session()->get('arr');

 
    return view('inputandlink', compact('checkingthelogin','id','session','arr','url'));
});



Route::get('//registration', function () {
    class Model {

    public $checkingregistration = 1;


    public function registration(){

    //$users = users::find(2)->url->name;

    $checkingregistration = 1;
    //$checkingregistration[1] =  $users;
    $name = $_GET["name"];
    $email = $_GET["email"];
    $password = $_GET["password"];
    $siteusers =  DB::table('users')->get();;



    if(($name != "")  && ($email != "") && ($password != "")){

        for($i=0;$i<count($siteusers);$i++){

            if($email == $siteusers[$i] -> email){
                $checkingregistration = 0;
             }      
        }


    } else {

        $checkingregistration = 0;

    }

    if ($checkingregistration == 1){
        $checkingregistration = 2;
         
        DB::insert('insert into users (email, password) values (?, ?)', [$email, $password]);
        $user_id = DB::table('users')->where([['email', '=', $email], ])->value('id');
        DB::insert('insert into urls (name, user_id , url ,short_code ) values (?, ?,?,?)', [$name, $user_id, '0', '0']);
        /*$checkingregistration[0] = 2;
        $checkingregistration[1] = $name;
        $checkingregistration[2] = $email;
        $checkingregistration[3] = $password;*/
    }


    return  $checkingregistration;
    }
        

    }











    $User = new Model;
    $checkingregistration = $User -> checkingregistration;
    if(isset($_GET["registration"])) {
         $checkingregistration = $User -> registration();

     }

    return view('registration', compact('checkingregistration'));
});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function login(Request $request)
    {
        $get = $request->all();
        $user = new Player;
        $cek = DB::select( "SELECT * from user where u_email = '".$get['u_email']."'");
        $hasil=array();
        // echo "<pre>";var_dump($cek);
        // die();
		if($cek){
			$hasil['success']= true;
			$hasil['u_id']= $cek[0]->u_id;
		}else{
            $user->u_name=$get['u_name'];
            $user->u_email=$get['u_email'];
            $user->u_avatar=$get['u_avatar'];
            $user->u_token_fcm=$get['u_token_fcm'];
            $user->save();
            // echo "<pre>";var_dump($user);
            // die();
            $hasil['success']=true;
            $hasil['u_id']= $user->u_id;
		}
		return $hasil;   
    }
    public function store(Request $request)
    {
        $get = $request->all();
        $get->u_name=$request->u_name;
        $get->u_email=$request->u_email;
        $get->u_avatar=$request->u_avatar;
        $get->u_token_fcm=$request->u_token_fcm;   
        $get->save();
        return $get;
    }
}

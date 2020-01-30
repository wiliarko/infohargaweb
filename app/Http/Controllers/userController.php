<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class userController extends Controller
{
    public function login(Request $request)
    {
        $get = $request->all();
        $cek = DB::select( "SELECT * from user where u_email = '".$get['u_email']."'");
		$hasil=array();
		// if($cek){
		// 	$hasil['success']= true;
		// 	$hasil['$u_id']= $cek['u_id'];
		// }else{
		// 	$hasil['success']=false;
		// 	$hasil['message']="data tidak ditemukan";
		// }
		return $hasil;
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Harga;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function index(){
		$cek = DB::select( "SELECT *,concat('".url('')."','/img/',p.p_avatar) as url_img FROM `harga` h left join product p on h.h_barcode=p.p_barcode LEFT join toko t on h.h_toko_id=t.t_id order by h.h_create_date") ;
		$hasil=array();
		if($cek){
			$hasil['success']=true;
			$hasil['message']="";
			$hasil['data']=$cek;
		}else{
			$hasil['success']=false;
			$hasil['message']="data tidak ditemukan";
		}
		return $hasil;
	}

	public function detail(Request $request,$id){
		$cek = DB::select( "SELECT *,DATE_FORMAT(h.h_create_date, '%b %e') as tanggal FROM harga h  LEFT join toko t on h.h_toko_id=t.t_id where h_barcode = '".$id."' order by h_create_date desc") ;
		$hasil=array();
		if($cek){
			$hasil['success']=true;
			$hasil['message']="";
			$hasil['data']=$cek;
		}else{
			$hasil['success']=false;
			$hasil['message']="data tidak ditemukan";
		}
		return $hasil;
	}

	public function getbycode(Request $request){
		$input = $request->all();

		$cek = DB::select( "SELECT *,concat('".url('')."','/img/',p_avatar) as url_img from product where p_barcode='".$input['barcode']."'");
		$hasil=array();
		if($cek){
			$hasil['success']=true;
			$hasil['message']="";
			$hasil['data']=$cek;
		}else{
			$hasil['success']=false;
			$hasil['message']="data tidak ditemukan";
		}
		return $hasil;
	}

	public function update(Request $request)
	{
		$input = $request->all();
		$data=array(
			"h_price"=>$input['h_price'],
			"h_barcode"=>$input['barcode']
		);

	    $cek=Harga::create($data);

	    if($cek){
			$hasil['success']=true;
			$hasil['message']="";
			$hasil['data']=$cek;
		}else{
			$hasil['success']=false;
			$hasil['message']="data tidak ditemukan";
		}
		return $hasil;
	}
	public function home()
	{
		$cek = DB::select( "SELECT * from product limit 20");
		$hasil=array();

		return view('home', compact('cek'));
	}
	public function add(Request $request){
	    return view('add');
	}

	public function store(Request $request){
	    $validasi = $request->validate([
			'p_name' => 'required',
			'p_barcode' => 'required',
			'p_avatar' => 'required',
			'p_harga_standar' => 'required'
			
	    ]);
	   	Product::create($validasi);

	    return redirect('home');
	}
}

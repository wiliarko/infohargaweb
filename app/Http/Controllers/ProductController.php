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
		$rumus = DB::select( "SELECT
					t_id, (
						6371000 * acos (
						cos ( radians(".$input['lat'].") )
						* cos( radians( t_lat ) )
						* cos( radians( t_long ) - radians(".$input['long'].") )
						+ sin ( radians(".$input['lat'].") )
						* sin( radians( t_lat ) )
						)
					) AS distance
					FROM toko where t_radius_toko > (
						6371000 * acos (
						cos ( radians(".$input['lat'].") )
						* cos( radians( t_lat ) )
						* cos( radians( t_long ) - radians(".$input['long'].") )
						+ sin ( radians(".$input['lat'].") )
						* sin( radians( t_lat ) )
						)
					)");
				// echo "<pre>";	var_dump($rumus);
				// die();
		$data=array(
			"h_price"=>$input['h_price'],
			"h_barcode"=>$input['barcode'],
			"lon"=>$input['long'],
			"lat"=>$input['lat'],
			"h_u_id"=>$input['u_id'],
			"h_toko_id"=>$rumus[0]->t_id
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
		$product = DB::select( "SELECT * from product limit 20");
		return view('home', compact('product'));
	}
	public function add(Request $request){
	    return view('add');
	}

	public function store(Request $request){
		$input = $request->all();
	    $validasi = $request->validate([
			'p_name' => 'required',
			'p_barcode' => 'required',
			'p_avatar' => 'required',
			'p_harga_standar' => 'required'
			
		]);
		$target_dir = public_path()."/img/";
		$target_file = $target_dir . basename($_FILES["p_avatar"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$file_name=$target_dir.$input['p_barcode'].".".$imageFileType;
		move_uploaded_file($_FILES["p_avatar"]["tmp_name"], $file_name);
		
		$input['p_avatar'] = $input['p_barcode'].".".$imageFileType;

	   	Product::create($input);

	    return redirect('home');
	}
	// public function edit($p_id){
	// 	$product = Product::find()->
	// 	// $product = Product::find($p_id);
	// 	// return view('edit', compact('product'));
	// 	return view('crud/edit');
	// }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;

class newController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::all();
        return view('home', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $store = $request->all();
        $validate = $request->validate([
            'p_name' => 'required|alpha',
            'p_barcode' => 'required',//|unique:users',
            'p_avatar' => 'required',
            'p_harga_standar' => 'required|numeric'
        ]);

        $target_dir = public_path()."/img/";
		$target_file = $target_dir . basename($_FILES["p_avatar"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$file_name=$target_dir.$store['p_barcode'].".".$imageFileType;
		move_uploaded_file($_FILES["p_avatar"]["tmp_name"], $file_name);
		
        $store['p_avatar'] = $store['p_barcode'].".".$imageFileType;
        
        Product::create($store);
            
        return redirect('product');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($p_id)
    {
        //
        $product = Product::find($p_id);
        // echo "<pre>"; var_dump($product);
        // die();
        return view('edit2', compact('product'));
    }

    public function update(Request $request)
    {
        //
        $store = $request->all();
        // $validate = $request->validate([
        //     'p_name' => 'required|alpha',
        //     'p_barcode' => 'required',//|unique:users',
        //     'p_avatar' => 'required',
        //     'p_harga_standar' => 'required|numeric'
        //     ]);
            
            // die("asdasd");
        $target_dir = public_path()."/img/";
        // echo "<pre>";var_dump($store);
        // die();
		$target_file = $target_dir . basename($_FILES["p_avatar"]["name"]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$file_name=$target_dir.$store['p_barcode'].".".$imageFileType;
		move_uploaded_file($_FILES["p_avatar"]["tmp_name"], $file_name);
		
        $store['p_avatar'] = $store['p_barcode'].".".$imageFileType;
        unset($store["_token"]);
        Product::where("p_id" ,$store["p_id"])->update($store);
            
        return redirect('product');
    }

    public function destroy($p_id)
    {
        //
        $destroy = Product::findOrFail($p_id);
	    $destroy->delete();

	    return redirect('product');
    }
}

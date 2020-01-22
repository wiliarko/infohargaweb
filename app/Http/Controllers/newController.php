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
            
        return redirect('home');
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
        return view('crud/edit', compact('product'));
    }

    public function update(Request $request)
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
        
        Product::where($store->$p_id)->update($store);
            
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

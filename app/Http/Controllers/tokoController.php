<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Toko;

class tokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $toko = Toko::all();
        return view('tokoHome', compact('toko'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        //
        return view('tokoAdd');
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
            't_name' => 'required|alpha',
            't_long' => 'required|numeric',//|unique:users',
            't_lat' => 'required|numeric',
            't_radius_toko' => 'required|numeric'
        ]);
        Toko::create($store);
            
        return redirect('toko');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($t_id)
    {
        //
        $toko = Toko::find($t_id);
        // echo "<pre>"; var_dump($product);
        // die();
        return view('tokoEdit', compact('toko'));
    }

    public function update(Request $request)
    {
        //
        $store = $request->all();
    
        unset($store["_token"]);
        Toko::where("t_id" ,$store["t_id"])->update($store);
            
        return redirect('toko');
    }

    public function destroy($t_id)
    {
        //
        $destroy = Toko::findOrFail($t_id);
	    $destroy->delete();

	    return redirect('toko');
    }
}

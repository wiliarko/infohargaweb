<?php

namespace App\Http\Controllers;

use App\Coba;
use Illuminate\Http\Request;

class CobaController extends Controller
{
	public function index()
	{
	    $coba = Coba::all();
	    return view('list', compact('coba'));
	}

    public function create(){
	    return view('tampil');
	}

	public function store(Request $request){
	    $validasi = $request->validate([
	        'nama' => 'required'
	    ]);
	    $coba = Coba::create($validasi);

	    return redirect('/coba')->with('success', 'Selamat data berhasil ditambah!');
	}

	public function edit(Coba $coba)
	{
	    return view('edit', compact('coba'));
	}

	public function update(Request $request, $id)
	{
	    $validasi = $request->validate([
	        'nama' => 'required'
	    ]);
	    Coba::whereId($id)->update($validasi);

	    return redirect('/coba')->with('success', 'Data berhasil di update');
	}

	public function destroy($id)
	{
	    $users = Coba::findOrFail($id);
	    $users->delete();

	    return redirect('/coba')->with('success', 'Data berhasil dihapus!');
	}

	public function indexapi(){
		return Coba::all();
	}

	public function storeapi(Request $request){
	    $validasi = $request->validate([
	        'nama' => 'required'
	    ]);
	    $coba = Coba::create($validasi);

	    return "Selamat data berhasil ditambah!";
	}

	public function updateapi(Request $request, $id)
	{
	    $validasi = $request->validate([
	        'nama' => 'required'
	    ]);
	    Coba::whereId($id)->update($validasi);

	    return 'Data berhasil di update';
	}

	public function destroyapi($id)
	{
	    $users = Coba::findOrFail($id);
	    $users->delete();

	    return 'Data berhasil dihapus!';
	}
}

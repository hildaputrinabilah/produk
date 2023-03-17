<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::All();
        return response()->json($data);

    }
    public function findByID($id)
    {
        $data = Produk::find($id);
        return response()->json($data);
    }
    public function save(StoreProdukRequest $request)
    {
        try{
            $produk = $request->validate([
            'nama_produk'=> 'required',
            'deskripsi_produk'=> 'required',
            'harga'=> 'required',
        ]);
        $data = new Produk();
        $data->nama_produk = $request->nama_produk;
        $data->deskripsi_produk =$request->deskripsi_produk;
        $data->harga = $request->harga;
        $data->save();
        return response()->json($data);

    }catch(Exception $e){
        return response()->json([
            'message'=>'Failed'.$e ->getMessage(),
            'statusCode' => 400,
            'data' => null
        ]);
    }

}
    public function updateProduk($id,UpdateProdukRequest $produk)
    {
    $data = Produk::find($id);
    $data->nama_produk=$produk->nama_produk;
    $data->deskripsi_produk=$produk->deskripsi_produk;
    $data->harga=$produk->harga;
    $data->save();
    return response()->json($data);
    }

    public function destroyProduk($id)
    {
    $data = Produk::find($id);
    $data->delete();
    return response()->json(['message'=> 'delete message']);
    }
}

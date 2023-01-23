<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use App\Models\Rekomendasi;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Rekomendasi as RekomendasiResource;

class RekomendasiController extends BaseController
{
    public function index()
    {
        $rekomendasis = Rekomendasi::all();
        return $this->sendResponse(RekomendasiResource::collection($rekomendasis), 'Posts fetched.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'no_perekomendasi' => 'required',
            'nama_perekomendasi' => 'required',
            'no_anggota' => 'required',
            'besar_pinjaman' => 'required',
            'tgl_rekomendasi' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $rekomendasi = Rekomendasi::create($input);
        return $this->sendResponse(new RekomendasiResource($rekomendasi), 'Post created.');
    }

    public function show($id)
    {
        $rekomendasi = Rekomendasi::find($id);
        if (is_null($rekomendasi)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new RekomendasiResource($rekomendasi), 'Post fetched.');
    }

    public function update(Request $request, Rekomendasi $rekomendasi)
    {
        $validator = Validator::make($request->all(), [
            'no_perekomendasi' => 'required',
            'nama_perekomendasi' => 'required',
            'no_anggota' => 'required',
            'besar_pinjaman' => 'required',
            'tgl_rekomendasi' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $rekomendasi->no_perekomendasi = $request->no_perekomendasi;
        $rekomendasi->nama_perekomendasi = $request->nama_perekomendasi;
        $rekomendasi->no_anggota = $request->no_anggota;
        $rekomendasi->besar_pinjaman = $request->besar_pinjaman;
        $rekomendasi->tgl_rekomendasi = $request->tgl_rekomendasi;
        $rekomendasi->save();

        return $this->sendResponse(new RekomendasiResource($rekomendasi), 'Rekomendasi updated.');
    }

    public function destroy(Rekomendasi $rekomendasi)
    {
        $rekomendasi->delete();
        return $this->sendResponse([], 'Rekomendasi deleted.');
    }
}

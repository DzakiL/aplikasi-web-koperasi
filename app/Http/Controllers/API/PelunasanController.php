<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use App\Models\Pelunasan;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Pelunasan as PelunasanResource;

class PelunasanController extends BaseController
{
    public function index()
    {
        $pelunasans = Pelunasan::all();
        return $this->sendResponse(PelunasanResource::collection($pelunasans), 'Posts fetched.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama' => 'required',
            'no_anggota' => 'required',
            'piutang' => 'required',
            'banyak_angsuran' => 'required',
            'angsuran_ke' => 'required',
            'angsuran_sisa' => 'required',
            'pokok' => 'required',
            'jasa' => 'required',
            'jumlah_angsuran' => 'required',
            'sisa_piutang' => 'required',
            'periode_pinjaman' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $pelunasan = Pelunasan::create($input);
        return $this->sendResponse(new PelunasanResource($pelunasan), 'Post created.');
    }

    public function show($id)
    {
        $pelunasan = Pelunasan::find($id);
        if (is_null($pelunasan)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new PelunasanResource($pelunasan), 'Post fetched.');
    }

    public function update(Request $request, Pelunasan $pelunasan)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'no_anggota' => 'required',
            'piutang' => 'required',
            'banyak_angsuran' => 'required',
            'angsuran_ke' => 'required',
            'angsuran_sisa' => 'required',
            'pokok' => 'required',
            'jasa' => 'required',
            'jumlah_angsuran' => 'required',
            'sisa_piutang' => 'required',
            'periode_pinjaman' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $pelunasan->nama = $request->nama;
        $pelunasan->no_anggota = $request->no_anggota;
        $pelunasan->piutang = $request->piutang;
        $pelunasan->banyak_angsuran = $request->banyak_angsuran;
        $pelunasan->angsuran_ke = $request->angsuran_ke;
        $pelunasan->angsuran_sisa = $request->angsuran_sisa;
        $pelunasan->pokok = $request->pokok;
        $pelunasan->jasa = $request->jasa;
        $pelunasan->jumlah_angsuran = $request->jumlah_angsuran;
        $pelunasan->sisa_piutang = $request->sisa_piutang;
        $pelunasan->periode_pinjaman = $request->periode_pinjaman;
        $pelunasan->save();

        return $this->sendResponse(new PelunasanResource($pelunasan), 'Pelunasan updated.');
    }

    public function destroy(Pelunasan $pelunasan)
    {
        $pelunasan->delete();
        return $this->sendResponse([], 'Pelunasan deleted.');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Simpanan;
use App\Http\Resources\Simpanan as SimpananResource;

class SimpananController extends BaseController
{
    public function index()
    {
        $simpanans = Simpanan::all();
        return $this->sendResponse(SimpananResource::collection($simpanans), 'Posts fetched.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama' => 'required',
            'no_anggota' => 'required',
            'transfer' => 'required',
            'tanggal' => 'required',
            'uraian' => 'required',
            'kode' => 'required',
            'debit' => 'required',
            'saldo' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $simpanan = Simpanan::create($input);
        return $this->sendResponse(new SimpananResource($simpanan), 'Post created.');
    }

    public function show($id)
    {
        $simpanan = Simpanan::find($id);
        if (is_null($simpanan)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new SimpananResource($simpanan), 'Post fetched.');
    }

    public function update(Request $request, Simpanan $simpanan)
    {
        // $input = $request->all();
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'no_anggota' => 'required',
            'transfer' => 'required',
            'tanggal' => 'required',
            'uraian' => 'required',
            'kode' => 'required',
            'debit' => 'required',
            'saldo' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $simpanan->nama = $request->nama;
        $simpanan->no_anggota = $request->no_anggota;
        $simpanan->transfer = $request->transfer;
        $simpanan->tanggal = $request->tanggal;
        $simpanan->uraian = $request->uraian;
        $simpanan->kode = $request->kode;
        $simpanan->debit = $request->debit;
        $simpanan->kredit = $request->kredit;
        $simpanan->saldo = $request->saldo;
        $simpanan->save();

        return $this->sendResponse(new SimpananResource($simpanan), 'Simpanan updated.');
    }

    public function destroy(Simpanan $simpanan)
    {
        $simpanan->delete();
        return $this->sendResponse([], 'Simpanan deleted.');
    }

    public function hitung(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'piutang' => 'required',
            'noAngsuran' => 'required',
            'angsuran' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $piutang = $request->piutang;
        $noAngsuran = $request->noAngsuran;
        $pokok = 100000;
        $jasa = ($request->angsuran - $pokok);
        $angsuran = $request->angsuran;
        $sisa = $piutang;
        $no = 1;
        $hasil = [];
        $hasil[] = "No#" . " Nama#" . " Piutang#" . " Angsuran" . " Ke#" . " Sisa#" . " Pokok#" . " Jasa#" . " Angsuran#" . " jumlah Piutang\n";
        for ($i = $noAngsuran; $i > 0; $i--) {
            $sisa -= $pokok;
            $hasil[] = $no . "# " . "nama# " . $piutang . "# " . $noAngsuran . "# " . $no . "# " . $i - 1 . "# " . $pokok . "# " . $jasa . "# " . $angsuran . "# " . $sisa;
            $no++;
        }

        return response()->json(['data' => $hasil, 'status' => 200]);
        // return response()->json([$hasil, 200])->header('Content-Type', 'application/json');
        // return $this->sendResponse([$hasil], 'Post fetched.');

        // return $this->sendResponse(new SimpananResource($hasil), 'Simpanan updated.');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Pinjaman as PinjamanResource;

class PinjamanController extends BaseController
{

    public function index()
    {
        $pinjamans = Pinjaman::all();
        return $this->sendResponse(PinjamanResource::collection($pinjamans), 'Posts fetched.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'no_anggota' => 'required',
            'besar_pinjaman' => 'required',
            'margin' => 'required',
            'total' => 'required',
            'keperluan' => 'required',
            'angsuran' => 'required',
            'bulan_mulai' => 'required',
            'bulan_selesai' => 'required',
            'angsuran_pokok' => 'required',
            'angsuran_margin' => 'required',
            'jumlah_angsuran' => 'required',
            'banyak_angsuran' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $pinjaman = Pinjaman::create($input);
        return $this->sendResponse(new PinjamanResource($pinjaman), 'Post created.');
    }

    public function show($id)
    {
        $pinjaman = Pinjaman::find($id);
        if (is_null($pinjaman)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new PinjamanResource($pinjaman), 'Post fetched.');
    }

    public function update(Request $request, Pinjaman $pinjaman)
    {
        // $input = $request->all();
        $validator = Validator::make($request->all(), [
            'no_anggota' => 'required',
            'besar_pinjaman' => 'required',
            'margin' => 'required',
            'total' => 'required',
            'keperluan' => 'required',
            'angsuran' => 'required',
            'bulan_mulai' => 'required',
            'bulan_selesai' => 'required',
            'angsuran_pokok' => 'required',
            'angsuran_margin' => 'required',
            'jumlah_angsuran' => 'required',
            'banyak_angsuran' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $pinjaman->no_anggota = $request->no_anggota;
        $pinjaman->besar_pinjaman = $request->besar_pinjaman;
        $pinjaman->margin = $request->margin;
        $pinjaman->total = $request->total;
        $pinjaman->keperluan = $request->keperluan;
        $pinjaman->angsuran = $request->angsuran;
        $pinjaman->bulan_mulai = $request->bulan_mulai;
        $pinjaman->bulan_selesai = $request->bulan_selesai;
        $pinjaman->angsuran_pokok = $request->angsuran_pokok;
        $pinjaman->angsuran_margin = $request->angsuran_margin;
        $pinjaman->jumlah_angsuran = $request->jumlah_angsuran;
        $pinjaman->banyak_angsuran = $request->banyak_angsuran;
        $pinjaman->save();

        return $this->sendResponse(new PinjamanResource($pinjaman), 'Pinjaman updated.');
    }

    public function destroy(Pinjaman $pinjaman)
    {
        $pinjaman->delete();
        return $this->sendResponse([], 'Pinjaman deleted.');
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
    }
}

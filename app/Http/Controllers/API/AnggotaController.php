<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Anggota as AnggotaResource;

use App\Http\Controllers\API\BaseController;

class AnggotaController extends BaseController
{
    public function index()
    {
        $anggotas = Anggota::all();
        return $this->sendResponse(AnggotaResource::collection($anggotas), 'Posts fetched.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama' => 'required',
            'no_anggota' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'nik' => 'required',
            'pekerjaan' => 'required',
            'institusi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'nama_bank' => 'required',
            'no_rekening' => 'required',
            'atas_nama' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $anggota = Anggota::create($input);
        return $this->sendResponse(new AnggotaResource($anggota), 'Post created.');
    }

    public function show($id)
    {
        $anggota = Anggota::find($id);
        if (is_null($anggota)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new AnggotaResource($anggota), 'Post fetched.');
    }

    public function update(Request $request, Anggota $anggota)
    {
        // $input = $request->all();
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'no_anggota' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'nik' => 'required',
            'pekerjaan' => 'required',
            'institusi' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'nama_bank' => 'required',
            'no_rekening' => 'required',
            'atas_nama' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $anggota->nama = $request->nama;
        $anggota->no_anggota = $request->no_anggota;
        $anggota->tempat_lahir = $request->tempat_lahir;
        $anggota->tgl_lahir = $request->tgl_lahir;
        $anggota->nik = $request->nik;
        $anggota->pekerjaan = $request->pekerjaan;
        $anggota->institusi = $request->institusi;
        $anggota->alamat = $request->alamat;
        $anggota->no_hp = $request->no_hp;
        $anggota->nama_bank = $request->nama_bank;
        $anggota->no_rekening = $request->no_rekening;
        $anggota->atas_nama = $request->atas_nama;
        $anggota->save();

        return $this->sendResponse(new AnggotaResource($anggota), 'Anggota updated.');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return $this->sendResponse([], 'Anggota deleted.');
    }
}

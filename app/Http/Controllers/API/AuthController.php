<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Resources\Anggota as AnggotaResource;

class AuthController extends BaseController
{
    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            $authUser = Auth::user();
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;

            return $this->sendResponse($success, 'User signed in');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }
        //masuk ke 2 tabel
        // $anggota = $this->anggota($request);
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        // $anggota = new AnggotaResource($anggota);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success,  'User created successfully.');
    }
    public function anggota($request)
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
        return $anggota;
        // return $this->sendResponse(new AnggotaResource($anggota), 'Post created.');
    }
}

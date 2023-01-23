<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Simpanan extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'no_anggota' => $this->no_anggota,
            'transfer' => $this->transfer,
            'tanggal' => $this->tanggal,
            'uraian' => $this->uraian,
            'kode' => $this->kode,
            'debit' => $this->debit,
            'kredit' => $this->kredit,
            'saldo' => $this->saldo,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}

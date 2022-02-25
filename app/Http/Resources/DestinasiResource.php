<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DestinasiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'          =>$this->id,
            'kategori'    =>$this->kategori->nama,
            'wilayah'     =>$this->wilayah->nama_wilayah,
            'nama'        =>$this->nama,
            'konten'      =>$this->konten,
            'photo'       =>$this->getPhoto(),
        ];
    }
}

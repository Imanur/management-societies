<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SocietiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        return [
            'id' => $this->id,
            'nik' => $this->nik,
            'fullname' => $this->fullname,
            'photo' => $this->photo,
            'gender' => $this->gender,
            'pob' => $this->pob,
            'dob' => $this->dob,
            'address' => $this->address,
            'religion' => $this->religion,
            'marital_status' => $this->marital_status,
            'profession' => $this->profession,
            'nationality' => $this->nationality,
        ];
    }
}

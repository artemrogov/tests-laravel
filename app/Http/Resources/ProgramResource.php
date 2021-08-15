<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id_program'=>$this->id,
            'name'=>$this->name_program,
            'description'=>$this->description,
            'active'=>$this->active,
            'meta'=>[
               'uuid'=>$this->uuid,
               'created_at'=>$this->created_at,
               'updated_at'=>$this->updated_at
            ]
        ];
    }
}

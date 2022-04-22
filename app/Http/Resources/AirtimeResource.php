<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AirtimeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            
            'Agent'=> $this->user->name,
            'amount'=>$this->amount,
            'provider'=>$this->operator,
            'reference'=>$this->reference
           
            
            
        ];
    }
}

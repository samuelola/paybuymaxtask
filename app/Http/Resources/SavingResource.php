<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SavingResource extends JsonResource
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
            
            'user'=> $this->user->name,
            'email'=>$this->user->email,
            'amount'=>$this->amount,
            'reference'=>$this->reference,
            'method_of_payment'=>$this->method_of_payment,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date
            
        ];
    }
}

<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Reviews;

class ProductResource extends JsonResource
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
            'name'=> $this->name,
            'desctiption'=>$this->detail,
            'price'=>$this->price,
            'stock'=>$this->stock == 0 ?'out of stock': $this->stock,
            'discount'=>$this->discount,
            'totalprice'=>round((1-($this->discount/100))*$this->price,2),
            'rating'=>$this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No Reating yet',
            // 'href'=>[
            //      'reviews'=> route('reviews.index',$this->id)
            // ]
        ];
        // parent::toArray($request);
    }
}

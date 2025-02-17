<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'weight' => $this->weight,
            'coffees'=> array_unique( CoffeeResource::collection($this->coffees)->pluck('name')->toArray()),
            'favorite_coffee' => $this->favorite($this->id),
            'callories' => $this->coffees_sum_calories
        ];

    }
}

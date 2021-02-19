<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this);
        // return parent::toArray($request);
        return [
            'owner_name' => $this->owner_name,
            'image' => asset($this->image),
            'restaurant_name' => $this->restaurant_name,
            'type' => $this->type,
            '24_hours' => $this->all_day ? 'yes' : 'no',
            'phone_number' => $this->phone_number,
            'whatsapp' => $this->whatsapp,
            'instagram' => $this->instagram,
            'website' => $this->website,
            'description' => $this->description,

        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title'=> $this->title,
            'desktop_image'=> 'storage/'.$this->desktop_image,
            'mobile_image'=> 'storage/'.$this->phone_image,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FooterSettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'email' => $this->email,
            'phone' => $this->phone,
            'instagram'=> $this->instagram,
            'facebook' => $this->facebook,
            'telegram' => $this->telegram,
            'linkedin' => $this->linkedin,
            'youtube' => $this->youtube,
            'copyright' => $this->copyright,
        ];
    }
}

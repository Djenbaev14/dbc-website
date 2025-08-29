<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'emails' => $this->email,
            'phones' => $this->phone,
            'work_days' => $this->work_days,
            'work_time' => $this->work_time,
            'lunch_time' => $this->lunch_time,
            'location' => $this->location,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyStateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        $lang = [
            'uz' => 'uz',
            'ru' => 'ru',
            'en' => 'en',
            'qr' => 'qr',
        ][$request->header('Accept-Language', 'uz')];
        return [
            'infos' => collect($this->infos)->map(function ($info) use ($lang) {
                return [
                    'title' => $info['title'][$lang] ?? null,
                    'desc'  => $info['desc'][$lang] ?? null,
                ];
            }),
            'image'=> 'storage/'.$this->image,
        ];
    }
}

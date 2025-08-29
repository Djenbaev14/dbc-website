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
    public function toArray($request)
    {
        // Qaysi tillarni qo‘llab-quvvatlaymiz
        $supportedLangs = ['uz', 'ru', 'en', 'qr'];

        // Browser / client yuborgan tilni olish
        $locale = $request->getPreferredLanguage($supportedLangs) ?? 'uz';

        // Har bir info elementini tilga moslab filter qilish
        $infos = collect($this->infos)->map(function ($info) use ($locale) {
            return [
                'icon' => $info['icon'] ?? null,
                'title' => $info['title'][$locale] ?? $info['title']['uz'] ?? null,
                'descriptions' => collect($info['descriptions'] ?? [])->map(fn ($desc) => [
                    'desc' => $desc['desc'],
                ]),
            ];
        });

        return [
            'infos' => $infos,
            'location' => $this->location,
        ];
    }
}

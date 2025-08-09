<?php

namespace App\Filament\Resources\TopBannerResource\Pages;

use App\Filament\Resources\TopBannerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTopBanner extends CreateRecord
{
    protected static string $resource = TopBannerResource::class;
    
    use CreateRecord\Concerns\Translatable;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        // edit sahifasiga yo'naltirish 1
        return $this->getResource()::getUrl('edit', ['record' => 1]);
    }
}

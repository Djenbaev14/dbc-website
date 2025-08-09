<?php

namespace App\Filament\Resources\FooterSettingResource\Pages;

use App\Filament\Resources\FooterSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFooterSetting extends CreateRecord
{
    protected static string $resource = FooterSettingResource::class;
    use CreateRecord\Concerns\Translatable;
    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        // edit page after creation 1   
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }
}

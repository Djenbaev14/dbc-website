<?php

namespace App\Filament\Resources\FooterSettingResource\Pages;

use App\Filament\Resources\FooterSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFooterSettings extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = FooterSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}

<?php

namespace App\Filament\Resources\FooterSettingResource\Pages;

use App\Filament\Resources\FooterSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFooterSetting extends EditRecord
{
    protected static string $resource = FooterSettingResource::class;

    use EditRecord\Concerns\Translatable;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}

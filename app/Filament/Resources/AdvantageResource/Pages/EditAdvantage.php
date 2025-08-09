<?php

namespace App\Filament\Resources\AdvantageResource\Pages;

use App\Filament\Resources\AdvantageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAdvantage extends EditRecord
{
    
    use EditRecord\Concerns\Translatable;
    protected static string $resource = AdvantageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

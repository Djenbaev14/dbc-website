<?php

namespace App\Filament\Resources\CompanyStatResource\Pages;

use App\Filament\Resources\CompanyStatResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCompanyStat extends CreateRecord
{
    protected static string $resource = CompanyStatResource::class;
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

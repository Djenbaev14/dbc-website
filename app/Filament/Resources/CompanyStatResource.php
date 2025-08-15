<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanyStatResource\Pages;
use App\Filament\Resources\CompanyStatResource\RelationManagers;
use App\Models\CompanyStat;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CompanyStatResource extends Resource
{
    protected static ?string $model = CompanyStat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                            Repeater::make('infos')
                                ->label('Информация')
                                ->schema([
                                    Tabs::make('LanguageTabs')
                                        ->tabs([
                                            Tab::make('O‘zbek')
                                                ->schema([
                                                    TextInput::make('title.uz')->label(' (UZ)'),
                                                    Textarea::make('desc.uz')->label('Tavsif (UZ)'),
                                                ]),
                                            Tab::make('Русский')
                                                ->schema([
                                                    TextInput::make('title.ru')->label('Заголовок (RU)'),
                                                    Textarea::make('desc.ru')->label('Описание (RU)'),
                                                ]),
                                            Tab::make('English')
                                                ->schema([
                                                    TextInput::make('title.en')->label('Title (EN)'),
                                                    Textarea::make('desc.en')->label('Description (EN)'),
                                                ]),
                                            Tab::make('Qaraqalpaq')
                                                ->schema([
                                                    TextInput::make('title.qr')->label('Sarlawha (QR)'),
                                                    Textarea::make('desc.qr')->label('Tawsiw (QR)'),
                                                ]),
                                        ])
                                        ->persistTabInQueryString() // Sahifa yangilansa ham tanlangan til saqlanadi
                                ])
                                ->defaultItems(1)
                                ->columnSpanFull(),
                            FileUpload::make('image')
                                ->image()
                                ->label('Изображение')
                                ->disk('public') 
                                ->directory('company_stats') 
                                ->imageEditor()
                                ->imageEditorAspectRatios([
                                    '16:9',
                                    '4:3',
                                    '1:1',
                                ])
                                ->columnSpan(12),
                    ])->columns(12)->columnSpan(12),
            ]);
    }
    public static function getTableQuery()
    {
        return parent::getTableQuery()->limit(1);
    }
    public static function getNavigationUrl(): string
    {
        // agar TopBanner mavjud bo'lsa, unga o'tadi, aks holda TopBanner yaratish sahifasiga yo'naltiradi
        return CompanyStat::exists() ? static::getUrl('edit', ['record' => 1]) : static::getUrl('create');
    }
    public static function getNavigationLabel(): string
    {
        return 'Статистика компании'; // Rus tilidagi nom
    }
    public static function getModelLabel(): string
    {
        return 'Статистика компании'; // Rus tilidagi yakka holdagi nom
    }
    public static function getPluralModelLabel(): string
    {
        return 'Статистика компании'; // Rus tilidagi ko'plik shakli
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanyStats::route('/'),
            'create' => Pages\CreateCompanyStat::route('/create'),
            'edit' => Pages\EditCompanyStat::route('/{record}/edit'),
        ];
    }
}

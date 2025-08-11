<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopBannerResource\Pages;
use App\Filament\Resources\TopBannerResource\RelationManagers;
use App\Models\TopBanner;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TopBannerResource extends Resource
{
    use Translatable;
    protected static ?string $model = TopBanner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                                TextInput::make('title')
                                    ->label('Текст заголовка')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(12),
                                FileUpload::make('desktop_image')
                                    ->image()
                                    ->label('Десктоп Фото')
                                    ->disk('public') 
                                    ->directory('top_banners/desktop') 
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->columnSpan(12),
                                FileUpload::make('phone_image')
                                    ->image()
                                    ->label('Телефон Фото')
                                    ->disk('public') 
                                    ->directory('top_banners/phone') 
                                    ->imageEditor()
                                    ->imageEditorAspectRatios([
                                        '16:9',
                                        '4:3',
                                        '1:1',
                                    ])
                                    ->columnSpan(12),
                    ])->columns(12)->columnSpan(12)
            ]);
    }
    
    public static function getNavigationLabel(): string
    {
        return 'Верхний баннер'; // Rus tilidagi nom
    }
    public static function getModelLabel(): string
    {
        return 'Верхний баннер'; // Rus tilidagi yakka holdagi nom
    }
    public static function getPluralModelLabel(): string
    {
        return 'Верхний баннер'; // Rus tilidagi ko'plik shakli
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
    
    public static function getTableQuery()
    {
        return parent::getTableQuery()->limit(1);
    }
    public static function getNavigationUrl(): string
    {
        // agar TopBanner mavjud bo'lsa, unga o'tadi, aks holda TopBanner yaratish sahifasiga yo'naltiradi
        return TopBanner::exists() ? static::getUrl('edit', ['record' => 1]) : static::getUrl('create');
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
            'index' => Pages\ListTopBanners::route('/'),
            'create' => Pages\CreateTopBanner::route('/create'),
            'edit' => Pages\EditTopBanner::route('/{record}/edit'),
        ];
    }
}

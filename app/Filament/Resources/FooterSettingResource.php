<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FooterSettingResource\Pages;
use App\Filament\Resources\FooterSettingResource\RelationManagers;
use App\Models\FooterSetting;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FooterSettingResource extends Resource
{
    use Translatable;
    protected static ?string $model = FooterSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema(
                        [
                            TextInput::make('email')
                                ->label('Электронная почта')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(6),
                            TextInput::make('phone')
                                ->label('Телефон')
                                ->required()
                                ->maxLength(20)
                                ->columnSpan(6),
                            TextInput::make('instagram')
                                ->label('Instagram')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(6),
                            TextInput::make('facebook')
                                ->label('Facebook')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(6),
                            TextInput::make('telegram')
                                ->label('Telegram')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(6),
                            TextInput::make('youtube')
                                ->label('YouTube')
                                ->required()
                                ->maxLength(255) 
                                ->columnSpan(6),
                            TextInput::make('linkedin')
                                ->label('LinkedIn')
                                ->required()
                                ->maxLength(255) 
                                ->columnSpan(6),
                        ]
                    )->columns(12)->columnSpan(12)
            ]);
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

    public static function getNavigationLabel(): string
    {
        return 'Настройки футера'; // Rus tilidagi nom
    }
    public static function getModelLabel(): string
    {
        return 'Настройки футера'; // Rus tilidagi yakka holdagi nom
    }
    public static function getPluralModelLabel(): string
    {
        return 'Настройки футера'; // Rus tilidagi ko'plik shakli
    }
    
    public static function getTableQuery()
    {
        return parent::getTableQuery()->limit(1);
    }
    public static function getNavigationUrl(): string
    {
        // agar TopBanner mavjud bo'lsa, unga o'tadi, aks holda TopBanner yaratish sahifasiga yo'naltiradi
        return FooterSetting::exists() ? static::getUrl('edit', ['record' => 1]) : static::getUrl('create');
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
            'index' => Pages\ListFooterSettings::route('/'),
            'create' => Pages\CreateFooterSetting::route('/create'),
            'edit' => Pages\EditFooterSetting::route('/{record}/edit'),
        ];
    }
}

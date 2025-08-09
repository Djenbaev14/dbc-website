<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdvantageResource\Pages;
use App\Filament\Resources\AdvantageResource\RelationManagers;
use App\Models\Advantage;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdvantageResource extends Resource
{
    use Translatable;
    protected static ?string $model = Advantage::class;

    protected static ?string $navigationIcon = 'fas-star'; // Example icon, you can change it to any other icon

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()
                    ->schema([
                        Group::make()
                            ->schema([
                                Forms\Components\TextInput::make('header')
                                    ->label('Заголовок')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(12),
                                Forms\Components\Textarea::make('description')
                                    ->label('Описание')
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpan(12),
                            ])->columnSpan(8)->columns(12),
                        Forms\Components\FileUpload::make('icon')
                            ->label('Иконка')
                            ->image()
                            ->disk('public')
                            ->directory('advantages')
                            ->nullable()
                            ->columnSpan(4),   
                    ])
                    ->columns(12)->columnSpan(12)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon')
                    ->label('Иконка')
                    ->simpleLightbox(fn ($record) =>  $record?->image ?? "Your Image Url address", defaultDisplayUrl: true)
                    ->sortable(),
                TextColumn::make('header')
                    ->label('Заголовок')
                    ->sortable()
                    ->searchable()
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
    public static function getNavigationLabel(): string
    {
        return 'Преимущества'; // Rus tilidagi nom
    }
    public static function getModelLabel(): string
    {
        return 'Преимущества'; // Rus tilidagi yakka holdagi nom
    }
    public static function getPluralModelLabel(): string
    {
        return 'Преимущества'; // Rus tilidagi ko'plik shakli
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAdvantages::route('/'),
            'create' => Pages\CreateAdvantage::route('/create'),
            'edit' => Pages\EditAdvantage::route('/{record}/edit'),
        ];
    }
}

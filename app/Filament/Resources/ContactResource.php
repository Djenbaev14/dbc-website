<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Afsakar\LeafletMapPicker\LeafletMapPicker;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static ?string $navigationIcon = 'fas-address-book';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Repeater::make('email')
                    ->label('E-mail')
                    ->minItems(1)
                    ->maxItems(5)
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required(),
                    ])
                    ->collapsible(),
                Repeater::make('phone')
                    ->label('Phone')
                    ->columns(1)
                    ->minItems(1)
                    ->maxItems(5)
                    ->createItemButtonLabel('Add Phone')
                    ->schema([
                        Forms\Components\TextInput::make('phone')
                            ->required()
                            ->maxLength(20),
                    ]), 
                Forms\Components\TextInput::make('work_days')
                    ->maxLength(255),
                Forms\Components\TextInput::make('work_time')
                    ->maxLength(255),
                Forms\Components\TextInput::make('lunch_time')
                    ->maxLength(255),
                LeafletMapPicker::make('location')
                    ->label('Property Location')
            ]);
    }
    public static function getNavigationUrl(): string
    {
        // agar TopBanner mavjud bo'lsa, unga o'tadi, aks holda TopBanner yaratish sahifasiga yo'naltiradi
        return Contact::exists() ? static::getUrl('edit', ['record' => 1]) : static::getUrl('create');
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('work_days')
                    ->searchable(),
                Tables\Columns\TextColumn::make('work_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lunch_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
        return 'Контакт'; // Rus tilidagi nom
    }
    public static function getModelLabel(): string
    {
        return 'Контакт'; // Rus tilidagi yakka holdagi nom
    }
    public static function getPluralModelLabel(): string
    {
        return 'Контакт'; // Rus tilidagi ko'plik shakli
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContacts::route('/'),
            'create' => Pages\CreateContact::route('/create'),
            'edit' => Pages\EditContact::route('/{record}/edit'),
        ];
    }
}

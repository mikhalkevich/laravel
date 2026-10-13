<?php

namespace App\Filament\Resources\Maintexts;

use App\Filament\Resources\Maintexts\Pages\CreateMaintext;
use App\Filament\Resources\Maintexts\Pages\EditMaintext;
use App\Filament\Resources\Maintexts\Pages\ListMaintexts;
use App\Filament\Resources\Maintexts\Schemas\MaintextForm;
use App\Filament\Resources\Maintexts\Tables\MaintextsTable;
use App\Models\Maintext;
use BackedEnum;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MaintextResource extends Resource
{
    protected static ?string $model = Maintext::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('name'),
            TextInput::make('url'),
            Textarea::make('body')->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name'),
            TextColumn::make('url'),
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
            'index' => ListMaintexts::route('/'),
            'create' => CreateMaintext::route('/create'),
            'edit' => EditMaintext::route('/{record}/edit'),
        ];
    }
}

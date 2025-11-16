<?php

namespace App\Filament\Resources\ClassStreams;

use App\Filament\Resources\ClassStreams\Pages\CreateClassStream;
use App\Filament\Resources\ClassStreams\Pages\EditClassStream;
use App\Filament\Resources\ClassStreams\Pages\ListClassStreams;
use App\Filament\Resources\ClassStreams\Pages\ViewClassStream;
use App\Filament\Resources\ClassStreams\Schemas\ClassStreamForm;
use App\Filament\Resources\ClassStreams\Schemas\ClassStreamInfolist;
use App\Filament\Resources\ClassStreams\Tables\ClassStreamsTable;
use App\Models\ClassStream;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ClassStreamResource extends Resource
{
    protected static ?string $model = ClassStream::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ClassStreamForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ClassStreamInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ClassStreamsTable::configure($table);
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
            'index' => ListClassStreams::route('/'),
            'create' => CreateClassStream::route('/create'),
            'view' => ViewClassStream::route('/{record}'),
            'edit' => EditClassStream::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\ClassStreams\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClassStreamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
            ]);
    }
}

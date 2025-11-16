<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('firstname')
                    ->required(),
                TextInput::make('lastname')
                    ->required(),
                TextInput::make('middlenames'),
                TextInput::make('class_room_id')
                    ->required()
                    ->numeric(),
                TextInput::make('class_stream_id')
                    ->required()
                    ->numeric(),
                TextInput::make('gender'),
                TextInput::make('phone')
                    ->tel(),
                Toggle::make('disability')
                    ->required(),
                TextInput::make('disability_type'),
                TextInput::make('accommodation'),
                TextInput::make('vulnerability')
                    ->required()
                    ->default('none'),
                TextInput::make('parent_name'),
                TextInput::make('parent_phone')
                    ->tel(),
            ]);
    }
}

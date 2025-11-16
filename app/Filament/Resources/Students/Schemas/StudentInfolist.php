<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StudentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Student Information')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        ImageEntry::make('photo')
                            ->label('Student Photo')
                            ->disk('public')
                            ->circular()
                            ->extraAttributes(['class' => 'w-36 h-36 border-2 border-gray-300'])
                            // if male show placeholder male image else female
                            ->defaultImageUrl(fn ($record) => $record->gender === 'male' ? asset('images/placeholder-student-male.png') : asset('images/placeholder-student-female.png')),
                        TextEntry::make('firstname'),
                        TextEntry::make('lastname'),
                        TextEntry::make('middlenames')
                            ->placeholder('-'),
                        TextEntry::make('classroom.name')
                            ->numeric(),
                        TextEntry::make('classstream.name')
                            ->numeric(),
                        TextEntry::make('gender')
                            ->placeholder('-'),
                        TextEntry::make('phone')
                            ->placeholder('-'),
                        IconEntry::make('disability')
                            ->boolean(),
                        TextEntry::make('disability_type')
                            ->placeholder('-'),
                        TextEntry::make('accommodation')
                            ->placeholder('-'),
                        TextEntry::make('vulnerability'),
                        TextEntry::make('parent_name')
                            ->placeholder('-'),
                        TextEntry::make('parent_phone')
                            ->placeholder('-'),
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                    ]),
            ]);
    }
}

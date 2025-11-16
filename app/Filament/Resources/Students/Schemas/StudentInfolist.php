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
                            ->directory('students/photos')
                            // if male show placeholder male image else female
                            ->placeholderImageUrl(fn ($record) => $record->gender === 'male' ? '/images/placeholder-student-male.png' : '/images/placeholder-student-female.png')
                            ->avatar(),
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

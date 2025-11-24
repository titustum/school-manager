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

                        // ---- PHOTO ----
                        ImageEntry::make('photo')
                            ->label('Student Photo')
                            ->disk('public')
                            ->circular()
                            ->defaultImageUrl(function ($record) {
                                $gender = strtolower($record->gender ?? 'male');

                                return asset($gender === 'male'
                                    ? 'images/male.jpg'
                                    : 'images/female.jpg'
                                );
                            }),

                        // ---- PERSONAL INFO ----
                        self::text('firstname', 'First Name'),
                        self::text('lastname', 'Last Name'),
                        self::text('middlenames', 'Middle Names'),
                        self::text('gender', 'Gender'),

                        // ---- CLASS INFO ----
                        self::text('classroom.name', 'Class Room'),
                        self::text('classstream.name', 'Class Stream'),

                        // ---- CONTACT ----
                        self::text('phone', 'Phone Number'),
                        self::text('parent_name', 'Parent Name'),
                        self::text('parent_phone', 'Parent Phone'),

                        // ---- DISABILITY / VULNERABILITY ----
                        IconEntry::make('disability')
                            ->boolean()
                            ->label('Disability'),
                        self::text('disability_type', 'Disability Type'),
                        self::text('accommodation', 'Accommodation'),
                        self::text('vulnerability', 'Vulnerability Status'),

                        // ---- SYSTEM FIELDS ----
                        TextEntry::make('created_at')
                            ->dateTime()
                            ->label('Created At')
                            ->placeholder('-'),
                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->label('Updated At')
                            ->placeholder('-'),
                    ]),
            ]);
    }

    /**
     * Helper to cleanly create text entries with a default placeholder
     */
    private static function text(string $field, ?string $label = null): TextEntry
    {
        return TextEntry::make($field)
            ->label($label)
            ->placeholder('-');
    }
}

<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Student Information')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([

                        FileUpload::make('photo')
                            ->label('Student Photo')
                            ->image()                          // only allow images
                            ->directory('students/photos')     // folder inside storage/app/public/
                            ->disk('public')                   // use public disk
                            ->imageEditor()                    // optional: enables crop/rotate/resize
                            ->maxSize(2048)                    // 2MB limit
                            ->avatar()                         // make it a circle
                            ->nullable(),
                        TextInput::make('firstname')
                            ->required()
                            ->maxlength(255),
                        TextInput::make('lastname')
                            ->required()
                            ->maxlength(255),
                        TextInput::make('middlenames')
                            ->maxlength(255)
                            ->nullable(),
                        Select::make('class_room_id')
                            ->required()
                            ->relationship('classRoom', 'name', fn ($query) => $query->orderBy('created_at', 'asc')),
                        Select::make('class_stream_id')
                            ->required()
                            ->relationship('classStream', 'name'),
                        Select::make('gender')
                            ->required()
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                            ]),
                        TextInput::make('phone')
                            ->tel(),
                        Toggle::make('disability')
                            ->required(),
                        Select::make('disability_type')
                            ->options([
                                'hearing' => 'Hearing',
                                'visual' => 'Visual',
                                'physical' => 'Physical',
                                'albino' => 'Albino',
                                'mental' => 'Mental',
                                'other' => 'Other',
                            ])
                            ->nullable(),
                        Select::make('accommodation')
                            ->required()
                            ->options([
                                'day' => 'Day Scholar',
                                'boarding' => 'Boarding',
                            ]),
                        Select::make('vulnerability')
                            ->required()
                            ->default('none')
                            ->options([
                                'none' => 'None',
                                'single_parent' => 'Single Parent',
                                'half_orphan' => 'Half Orphan',
                                'full_orphan' => 'Full Orphan',
                            ]),
                        TextInput::make('parent_name'),
                        TextInput::make('parent_phone')
                            ->tel(),
                    ]),
            ]);
    }
}

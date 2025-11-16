<?php

namespace App\Filament\Resources\Students\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StudentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->label('Photo')
                    ->disk('public')
                    ->placeholderImageUrl(fn ($record) => $record->gender === 'male' ? '/images/placeholder-student-male.png' : '/images/placeholder-student-female.png')
                    ->avatar(),
                TextColumn::make('firstname')
                    ->searchable(),
                TextColumn::make('lastname')
                    ->searchable(),
                TextColumn::make('classroom.name')
                    ->label('Class Room')
                    ->sortable(),
                TextColumn::make('classstream.name')
                    ->label('Class Stream')
                    ->sortable(),
                TextColumn::make('gender')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                IconColumn::make('disability')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}

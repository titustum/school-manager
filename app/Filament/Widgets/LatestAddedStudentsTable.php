<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestAddedStudentsTable extends TableWidget
{
    protected static ?int $sort = 5;

    protected int|string|array $columnSpan = 'full';

    protected int|string|array $rowSpan = 1;

    public function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->query(fn (): Builder => Student::query()->latest()->take(5)) // does not work and i dont know the problem
            ->columns([
                ImageColumn::make('photo')
                    ->label('Photo')
                    ->disk('public')
                    ->defaultImageUrl(fn ($record) => $record->gender === 'male'
                            ? asset('images/male.jpg')
                            : asset('images/female.jpg')
                    )
                    ->circular(),
                TextColumn::make('fullname') // fullname accessor in Student model
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
            ->headerActions([
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

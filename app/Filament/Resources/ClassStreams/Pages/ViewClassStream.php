<?php

namespace App\Filament\Resources\ClassStreams\Pages;

use App\Filament\Resources\ClassStreams\ClassStreamResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewClassStream extends ViewRecord
{
    protected static string $resource = ClassStreamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

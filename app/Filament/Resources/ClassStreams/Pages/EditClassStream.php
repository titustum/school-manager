<?php

namespace App\Filament\Resources\ClassStreams\Pages;

use App\Filament\Resources\ClassStreams\ClassStreamResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditClassStream extends EditRecord
{
    protected static string $resource = ClassStreamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}

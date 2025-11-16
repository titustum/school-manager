<?php

namespace App\Filament\Resources\ClassStreams\Pages;

use App\Filament\Resources\ClassStreams\ClassStreamResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListClassStreams extends ListRecords
{
    protected static string $resource = ClassStreamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}

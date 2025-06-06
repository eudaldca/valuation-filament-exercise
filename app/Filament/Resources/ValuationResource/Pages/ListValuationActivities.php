<?php

namespace App\Filament\Resources\ValuationResource\Pages;

use App\Filament\Resources\ValuationResource;
use Filament\Actions\Action;
use pxlrbt\FilamentActivityLog\Pages\ListActivities;

class ListValuationActivities extends ListActivities
{
    protected static string $resource = ValuationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('view')->url(fn($record) => ValuationResource::getUrl('view', ['record' => $record])),
        ];
    }
}

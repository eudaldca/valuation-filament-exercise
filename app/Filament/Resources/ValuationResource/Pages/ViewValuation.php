<?php

namespace App\Filament\Resources\ValuationResource\Pages;

use App\Filament\Resources\ValuationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;

class ViewValuation extends ViewRecord
{
    protected static string $resource = ValuationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Action::make('activities')->url(fn($record) => ValuationResource::getUrl('activities', ['record' => $record])),
        ];
    }
}

<?php

namespace App\Filament\Resources\OutletResource\Pages;

use App\Filament\Resources\OutletResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOutlets extends ListRecords
{
    protected static string $resource = OutletResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

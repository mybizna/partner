<?php

namespace Modules\Partner\Filament\Resources\MetaResource\Pages;

use Modules\Partner\Filament\Resources\MetaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMetas extends ListRecords
{
    protected static string $resource = MetaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

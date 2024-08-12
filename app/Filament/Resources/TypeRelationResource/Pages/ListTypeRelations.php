<?php

namespace Modules\Partner\Filament\Resources\TypeRelationResource\Pages;

use Modules\Partner\Filament\Resources\TypeRelationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTypeRelations extends ListRecords
{
    protected static string $resource = TypeRelationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

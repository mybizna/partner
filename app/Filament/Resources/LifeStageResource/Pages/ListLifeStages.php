<?php

namespace Modules\Partner\Filament\Resources\LifeStageResource\Pages;

use Modules\Partner\Filament\Resources\LifeStageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLifeStages extends ListRecords
{
    protected static string $resource = LifeStageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

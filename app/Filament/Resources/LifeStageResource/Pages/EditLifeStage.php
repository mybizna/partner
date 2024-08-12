<?php

namespace Modules\Partner\Filament\Resources\LifeStageResource\Pages;

use Modules\Partner\Filament\Resources\LifeStageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLifeStage extends EditRecord
{
    protected static string $resource = LifeStageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

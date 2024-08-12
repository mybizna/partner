<?php

namespace Modules\Partner\Filament\Resources\TypeRelationResource\Pages;

use Modules\Partner\Filament\Resources\TypeRelationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTypeRelation extends EditRecord
{
    protected static string $resource = TypeRelationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

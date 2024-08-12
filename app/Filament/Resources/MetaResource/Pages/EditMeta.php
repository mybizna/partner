<?php

namespace Modules\Partner\Filament\Resources\MetaResource\Pages;

use Modules\Partner\Filament\Resources\MetaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMeta extends EditRecord
{
    protected static string $resource = MetaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

<?php

namespace Modules\Partner\Filament\Resources\SlugResource\Pages;

use Modules\Partner\Filament\Resources\SlugResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSlug extends EditRecord
{
    protected static string $resource = SlugResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}

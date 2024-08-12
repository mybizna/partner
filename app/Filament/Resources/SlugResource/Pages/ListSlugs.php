<?php

namespace Modules\Partner\Filament\Resources\SlugResource\Pages;

use Modules\Partner\Filament\Resources\SlugResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSlugs extends ListRecords
{
    protected static string $resource = SlugResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

<?php

namespace Modules\Partner\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Partner\Models\Slug;

class SlugResource extends BaseResource
{
    protected static ?string $model = Slug::class;

    protected static ?string $slug = 'partner/slug';

    protected static ?string $navigationGroup = 'Partner';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}

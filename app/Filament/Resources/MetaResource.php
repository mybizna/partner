<?php

namespace Modules\Partner\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Partner\Models\Meta;

class MetaResource extends BaseResource
{
    protected static ?string $model = Meta::class;

    protected static ?string $slug = 'partner/meta';

    protected static ?string $navigationGroup = 'Partner';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


}

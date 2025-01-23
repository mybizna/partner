<?php

namespace Modules\Partner\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Partner\Models\Type;

class TypeResource extends BaseResource
{
    protected static ?string $model = Type::class;

    protected static ?string $slug = 'partner/type';

    protected static ?string $navigationGroup = 'Partner';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}

<?php

namespace Modules\Partner\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Partner\Models\TypeRelation;

class TypeRelationResource extends BaseResource
{
    protected static ?string $model = TypeRelation::class;

    protected static ?string $slug = 'partner/type/relation';

    protected static ?string $navigationGroup = 'Partner';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}

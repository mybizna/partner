<?php

namespace Modules\Partner\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Partner\Models\Partner;

class PartnerResource extends BaseResource
{
    protected static ?string $model = Partner::class;

    protected static ?string $slug = 'partner/partner';

    protected static ?string $navigationGroup = 'Partner';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

}

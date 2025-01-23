<?php

namespace Modules\Partner\Filament\Resources;

use Modules\Base\Filament\Resources\BaseResource;
use Modules\Partner\Models\LifeStage;

class LifeStageResource extends BaseResource
{
    protected static ?string $model = LifeStage::class;

    protected static ?string $slug = 'partner/lifestage';

    protected static ?string $navigationGroup = 'Mpesa';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


}

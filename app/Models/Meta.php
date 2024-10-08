<?php

namespace Modules\Partner\Models;

use Modules\Base\Models\BaseModel;
use Modules\Partner\Models\Partner;

class Meta extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['partner_id', 'meta_key', 'meta_value'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "partner_meta";

    /**
     * Add relationship to Partner
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

}

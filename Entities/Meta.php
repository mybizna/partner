<?php

namespace Modules\Partner\Entities;

use Modules\Base\Entities\BaseModel;

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

}

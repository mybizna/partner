<?php

namespace Modules\Partner\Entities;

use Modules\Base\Entities\BaseModel;

class Slug extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['partner_id', 'slug'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "partner_slug";

}

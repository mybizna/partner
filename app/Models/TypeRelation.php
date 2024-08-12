<?php

namespace Modules\Partner\Models;

use Modules\Base\Models\BaseModel;

class TypeRelation extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['partner_id', 'partner_types_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "partner_type_relation";

}

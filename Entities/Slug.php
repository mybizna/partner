<?php

namespace Modules\Partner\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
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

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);
        
        $this->fields->increments('id')->html('hidden');
        $this->fields->foreignId('partner_id')->nullable()->index('partner_id')->html('recordpicker')->relation(['partner']);
        $this->fields->string('slug')->nullable()->html('text');
    }

 

}

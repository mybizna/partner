<?php

namespace Modules\Partner\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class LifeStage extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['slug', 'title', 'title_plural', 'position'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "partner_life_stage";

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
        $this->fields->string('slug', 100)->nullable()->unique('slug')->html('text');
        $this->fields->string('title', 100)->nullable()->html('text');
        $this->fields->string('title_plural', 100)->nullable()->html('text');
        $this->fields->unsignedSmallInteger('position')->default(0)->html('switch');
    }




}

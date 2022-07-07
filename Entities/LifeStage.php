<?php

namespace Modules\Partner\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class LifeStage extends BaseModel
{

    protected $fillable = ['slug', 'title', 'title_plural', 'position'];
    public $migrationDependancy = [];
    protected $table = "partner_life_stage";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->string('slug', 100)->nullable()->unique('slug');
        $table->string('title', 100)->nullable();
        $table->string('title_plural', 100)->nullable();
        $table->unsignedSmallInteger('position')->default(0);
    }
}

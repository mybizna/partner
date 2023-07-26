<?php

namespace Modules\Partner\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class LifeStage extends BaseModel
{

    protected $fillable = ['slug', 'title', 'title_plural', 'position'];
    public $migrationDependancy = [];
    protected $table = "partner_life_stage";

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('slug')->type('text')->ordering(true);
        $fields->name('title')->type('text')->ordering(true);
        $fields->name('title_plural')->type('text')->ordering(true);
        $fields->name('position')->type('text')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('slug')->type('text')->group('w-1/2');
        $fields->name('title')->type('text')->group('w-1/2');
        $fields->name('title_plural')->type('text')->group('w-1/2');
        $fields->name('position')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('slug')->type('text')->group('w-1/6');
        $fields->name('title')->type('text')->group('w-1/6');
        $fields->name('title_plural')->type('text')->group('w-1/6');
        $fields->name('position')->type('text')->group('w-1/6');

        return $fields;

    }
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

<?php

namespace Modules\Partner\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

ules\Core\Classes\Views\FormBuilder;

class Type extends BaseModel
{

    protected $fillable = ['name'];
    public $migrationDependancy = [];
    protected $table = "partner_type";

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('name')->type('text')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('name')->type('text')->group('w-1/6');

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
        $table->string('name', 20)->nullable()->unique('name');
    }
}

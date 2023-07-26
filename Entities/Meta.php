<?php

namespace Modules\Partner\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class Meta extends BaseModel
{

    protected $fillable = ['partner_id', 'meta_key', 'meta_value'];
    public $migrationDependancy = [];
    protected $table = "partner_meta";

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('partner_id')->type('text')->ordering(true);
        $fields->name('meta_key')->type('text')->ordering(true);
        $fields->name('meta_value')->type('text')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('partner_id')->type('text')->group('w-1/2');
        $fields->name('meta_key')->type('text')->group('w-1/2');
        $fields->name('meta_value')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('partner_id')->type('text')->group('w-1/6');
        $fields->name('meta_key')->type('text')->group('w-1/6');
        $fields->name('meta_value')->type('text')->group('w-1/6');

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
        $table->bigInteger('partner_id')->nullable()->index('partner_id');
        $table->string('meta_key')->nullable();
        $table->longText('meta_value')->nullable();
    }
}

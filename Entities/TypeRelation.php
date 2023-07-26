<?php

namespace Modules\Partner\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class TypeRelation extends BaseModel
{

    protected $fillable = ['partner_id', 'partner_types_id'];
    public $migrationDependancy = [];
    protected $table = "partner_type_relation";

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('partner_id')->type('recordpicker')->table('partner')->ordering(true);
        $fields->name('partner_types_id')->type('recordpicker')->table('partner_types')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('partner_id')->type('recordpicker')->table('partner')->group('w-1/2');
        $fields->name('partner_types_id')->type('recordpicker')->table('partner_types')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('partner_id')->type('recordpicker')->table('partner')->group('w-1/6');
        $fields->name('partner_types_id')->type('recordpicker')->table('partner_types')->group('w-1/6');

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
        $table->bigIncrements('id');
        $table->unsignedBigInteger('partner_id')->nullable()->index('partner_id');
        $table->unsignedInteger('partner_types_id')->nullable()->index('partner_types_id');
    }
}

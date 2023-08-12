<?php

namespace Modules\Partner\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class TypeRelation extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['partner_id', 'partner_types_id'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['partner_id'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "partner_type_relation";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */
    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('partner_id')->type('recordpicker')->table(['partner'])->ordering(true);
        $fields->name('partner_types_id')->type('recordpicker')->table(['partner', 'types'])->ordering(true);

        return $fields;

    }

    /**
     * Function for defining list of fields in form view.
     *
     * @return FormBuilder
     */
    public function formBuilder(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('partner_id')->type('recordpicker')->table(['partner'])->group('w-1/2');
        $fields->name('partner_types_id')->type('recordpicker')->table(['partner', 'types'])->group('w-1/2');

        return $fields;

    }

    /**
     * Function for defining list of fields in filter view.
     *
     * @return FormBuilder
     */
    public function filter(): FormBuilder
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('partner_id')->type('recordpicker')->table(['partner'])->group('w-1/6');
        $fields->name('partner_types_id')->type('recordpicker')->table(['partner', 'types'])->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table): void
    {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('partner_id')->nullable()->index('partner_id');
        $table->unsignedInteger('partner_types_id')->nullable()->index('partner_types_id');
    }
}

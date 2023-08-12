<?php

namespace Modules\Partner\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Classes\Views\FormBuilder;
use Modules\Base\Classes\Views\ListTable;
use Modules\Base\Entities\BaseModel;

class Partner extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id', 'first_name', 'last_name', "type_str", 'company', 'email', 'phone', 'mobile', 'other', 'website',
        'fax', 'notes', 'address', 'city', 'state', 'postal_code',
        'country_id', 'currency_id', 'life_stage', 'hash',
    ];



    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['first_name', 'last_name', 'phone'];

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
    protected $table = "partner";

    /**
     * Function for defining list of fields in table view.
     *
     * @return ListTable
     */

    public function listTable(): ListTable
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('user_id')->type('recordpicker')->table([ 'users'])->ordering(true);

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

        $fields->name('user_id')->type('recordpicker')->table([ 'users'])->group('w-1/2');

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

        $fields->name('user_id')->type('recordpicker')->table([ 'users'])->group('w-1/6');

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
        $table->increments('id');
        $table->foreignId('user_id')->nullable()->index('user_id');
        $table->string('first_name', 60)->nullable();
        $table->string('last_name', 60)->nullable();
        $table->enum('type_str', ['customer', 'suppier'])->default('customer')->nullable();
        $table->string('company', 60)->nullable();
        $table->string('email', 100)->nullable()->index('email');
        $table->string('phone', 100)->nullable();
        $table->string('mobile', 100)->nullable();
        $table->string('other', 50)->nullable();
        $table->string('website', 100)->nullable();
        $table->string('fax', 20)->nullable();
        $table->text('notes')->nullable();
        $table->string('address')->nullable();
        $table->string('city', 80)->nullable();
        $table->string('state', 50)->nullable();
        $table->string('postal_code', 10)->nullable();
        $table->foreignId('country_id')->nullable();
        $table->foreignId('currency_id')->nullable();
        $table->string('life_stage')->nullable();
        $table->string('hash', 40)->nullable();
    }
    /**
     * Handle post migration processes for adding foreign keys.
     *
     * @param Blueprint $table
     *
     * @return void
     */
    public function post_migration(Blueprint $table): void
    {
        Migration::addForeign($table, 'users', 'user_id');
        Migration::addForeign($table, 'core_country', 'country_id');
        Migration::addForeign($table, 'core_currency', 'currency_id');
    }
}

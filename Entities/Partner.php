<?php

namespace Modules\Partner\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;
use Modules\Core\Classes\Views\FormBuilder;
use Modules\Core\Classes\Views\ListTable;

class Partner extends BaseModel
{

    protected $fillable = [
        'user_id', 'first_name', 'last_name', "type_str", 'company', 'email', 'phone', 'mobile', 'other', 'website',
        'fax', 'notes', 'address', 'city', 'state', 'postal_code',
        'country_id', 'currency_id', 'life_stage', 'hash',
    ];
    public $migrationDependancy = [];
    protected $table = "partner";

    public function listTable()
    {
        // listing view fields
        $fields = new ListTable();

        $fields->name('user_id')->type('recordpicker')->table('users')->ordering(true);

        return $fields;

    }

    public function formBuilder()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/2');

        return $fields;

    }

    public function filter()
    {
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('user_id')->type('recordpicker')->table('users')->group('w-1/6');

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

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'users', 'user_id');
        Migration::addForeign($table, 'core_country', 'country_id');
        Migration::addForeign($table, 'core_currency', 'currency_id');
    }
}

<?php

namespace Modules\Partner\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('text');
        $this->fields->foreignId('user_id')->nullable()->index('user_id')->html('recordpicker')->table(['users']);
        $this->fields->string('first_name', 60)->nullable()->html('text');
        $this->fields->string('last_name', 60)->nullable()->html('text');
        $this->fields->enum('type_str', ['customer', 'suppier'])->default('customer')->nullable()->html('select');
        $this->fields->string('company', 60)->nullable()->html('text');
        $this->fields->string('email', 100)->nullable()->index('email')->html('email');
        $this->fields->string('phone', 100)->nullable()->html('text');
        $this->fields->string('mobile', 100)->nullable()->html('text');
        $this->fields->string('other', 50)->nullable()->html('text');
        $this->fields->string('website', 100)->nullable()->html('text');
        $this->fields->string('fax', 20)->nullable()->html('text');
        $this->fields->text('notes')->nullable()->html('text');
        $this->fields->string('address')->nullable()->html('text');
        $this->fields->string('city', 80)->nullable()->html('text');
        $this->fields->string('state', 50)->nullable()->html('text');
        $this->fields->string('postal_code', 10)->nullable()->html('text');
        $this->fields->foreignId('country_id')->nullable()->html('text');
        $this->fields->foreignId('currency_id')->nullable()->html('text');
        $this->fields->string('life_stage')->nullable()->html('text');
        $this->fields->string('hash', 40)->nullable()->html('text');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure = [
            'table' => ['user_id', 'first_name', 'last_name', 'company', 'email', 'phone', 'mobile', 'address', 'city', 'state'],
            'filter' => ['first_name', 'last_name', 'company', 'email', 'phone'],
        ];

        return $structure;
    }

}

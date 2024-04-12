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

        $type = ['customer', 'suppier'];
        $gender = ['male', 'female'];

        $this->fields->increments('id')->html('hidden');
        $this->fields->foreignId('user_id')->nullable()->index('user_id')->html('recordpicker')->relation(['users']);
        $this->fields->foreignId('inviter_id')->nullable()->index('inviter_id')->html('recordpicker')->relation(['users']);
        $this->fields->string('first_name', 60)->nullable()->html('text');
        $this->fields->string('last_name', 60)->nullable()->html('text');
        $this->fields->enum('type_str', $type)->options($type)->default('customer')->nullable()->html('select');
        $this->fields->enum('gender', $gender)->options($gender)->default('male')->nullable()->html('select');
        $this->fields->string('company', 60)->nullable()->html('text');
        $this->fields->string('email', 100)->nullable()->index('email')->html('email');
        $this->fields->string('phone', 100)->nullable()->html('text');
        $this->fields->string('birth_date')->html('datetime');
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

        $structure['table'] = ['user_id', 'first_name', 'last_name', 'company', 'email', 'phone', 'mobile', 'address', 'city', 'state'];
        $structure['form'] = [
            ['label' => 'Partner User', 'class' => 'col-span-full', 'fields' => ['user_id']],
            ['label' => 'Partner Bio Info', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['first_name', 'last_name', "type_str", 'company', 'email', 'phone', 'mobile']],
            ['label' => 'Partner Contact Detail', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['website', 'fax', 'notes', 'address', 'city', 'state', 'postal_code']],
            ['label' => 'Partner Other Setting', 'class' => 'col-span-full md:col-span-6ull  md:col-span-6 md:pr-2', 'fields' => ['country_id', 'currency_id', 'life_stage', 'hash']],
        ];
        $structure['filter'] = ['first_name', 'last_name', 'company', 'email', 'phone'];

        return $structure;
    }

    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {
        $rights = parent::rights();

        $rights['staff'] = ['view' => true];
        $rights['registered'] = [];
        $rights['guest'] = [];

        return $rights;
    }

}

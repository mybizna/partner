<?php

namespace Modules\Partner\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class LifeStage extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['slug', 'title', 'title_plural', 'position'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['title'];
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
    protected $table = "partner_life_stage";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('slug', 100)->nullable()->unique('slug')->html('text');
        $this->fields->string('title', 100)->nullable()->html('text');
        $this->fields->string('title_plural', 100)->nullable()->html('text');
        $this->fields->unsignedSmallInteger('position')->default(0)->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['slug', 'title', 'title_plural', 'position'];
        $structure['form'] = [
            ['label' => 'Life Stage Title', 'class' => 'col-span-full', 'fields' => ['title', 'slug']],
            ['label' => 'Life Stage Setting', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['title_plural', 'position']],
        ];
        $structure['filter'] = ['slug', 'title', 'title_plural', 'position'];

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
        $rights['registered'] = ['view' => true];
        $rights['guest'] = [];

        return $rights;
    }
}

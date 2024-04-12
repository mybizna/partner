<?php

namespace Modules\Partner\Entities;

use Illuminate\Database\Schema\Blueprint;
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
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);
        
        $this->fields->bigIncrements('id')->html('text');
        $this->fields->unsignedBigInteger('partner_id')->nullable()->index('partner_id')->html('recordpicker')->relation(['partner']);
        $this->fields->unsignedInteger('partner_types_id')->nullable()->index('partner_types_id')->html('recordpicker')->relation(['partner', 'types']);
    }

    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {

    }
}

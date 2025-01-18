<?php

namespace Modules\Partner\Models;

use Modules\Base\Models\BaseModel;
use Modules\Partner\Models\Partner;
use Modules\Partner\Models\Type;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;

class TypeRelation extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['partner_id', 'partner_types_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "partner_type_relation";

    /**
     * Add relationship to Partner
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    /**
     * Add relationship to PartnerType
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partnerType(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }


    public function migration(Blueprint $table): void
    {

        $table->foreignId('partner_id')->nullable()->constrained(table: 'partner_partner')->onDelete('set null');
        $table->foreignId('partner_type_id')->nullable()->constrained(table: 'partner_type')->onDelete('set null');
    }
}

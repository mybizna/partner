<?php

namespace Modules\Partner\Models;

use Modules\Base\Models\BaseModel;
use Modules\Partner\Models\Partner;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slug extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['partner_id', 'slug'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "partner_slug";

    /**
     * Add relationship to Partner
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }


    public function migration(Blueprint $table): void
    {

        $table->foreignId('partner_id')->nullable()->constrained(table: 'partner_partner')->onDelete('set null');
        $table->string('slug')->nullable();

    }
}

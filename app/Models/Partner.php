<?php

namespace Modules\Partner\Models;

use App\Models\User;
use Modules\Base\Models\BaseModel;
use Modules\Core\Models\Country;
use Modules\Core\Models\Currency;
use Modules\Partner\Models\Meta;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "partner_partner";

    /**
     * Add relationship to Meta
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function meta(): HasMany
    {
        return $this->hasMany(Meta::class);
    }

    /**
     * Add relationship to Country
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Add relationship to Currency
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    /**
     * Add relationship to User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function migration(Blueprint $table)
    {

        $table->foreignId('user_id')->nullable()->constrained(table: 'users')->onDelete('set null');

        $table->string('first_name', 60)->nullable();
        $table->string('last_name', 60)->nullable();
        $table->enum('type_str', ['customer', 'suppier'])->nullable()->default('customer');
        $table->enum('gender', ['male', 'female'])->nullable()->default('male');
        $table->string('company', 60)->nullable();
        $table->string('email', 100)->nullable();
        $table->string('phone', 100)->nullable();
        $table->string('birth_date')->nullable();
        $table->string('mobile', 100)->nullable();
        $table->string('other', 50)->nullable();
        $table->string('website', 100)->nullable();
        $table->string('fax', 20)->nullable();
        $table->text('notes')->nullable();
        $table->string('address')->nullable();
        $table->string('city', 80)->nullable();
        $table->string('state', 50)->nullable();
        $table->string('postal_code', 10)->nullable();
        $table->foreignId('country_id')->nullable()->constrained(table: 'core_country')->onDelete('set null');
        $table->foreignId('currency_id')->nullable()->constrained(table: 'core_currency')->onDelete('set null');
        $table->string('life_stage')->nullable();
        $table->string('hash', 40)->nullable();

    }
}

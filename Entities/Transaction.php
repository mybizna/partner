<?php

namespace Modules\Partner\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class Transaction extends BaseModel
{

    protected $fillable = [
        'people_id', 'voucher_no','amount','trn_date','trn_by','particulars','voucher_type'
];
    public $migrationDependancy = [];
    protected $table = "partner_transaction";

    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {

        $table->increments('id');
        $table->string('people_id')->nullable();
        $table->integer('voucher_no')->nullable();
        $table->decimal('amount', 20, 2)->default(0.00);
        $table->date('trn_date')->nullable();
        $table->string('trn_by')->nullable();
        $table->string('particulars')->nullable();
        $table->string('voucher_type')->nullable();

    }
}

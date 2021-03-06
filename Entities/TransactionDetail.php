<?php

namespace Modules\Partner\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;

class TransactionDetail extends BaseModel
{

    protected $fillable = [
        'people_id', 'voucher_no', 'trn_date', 'particulars', 'debit', 'credit'
    ];
    public $migrationDependancy = [];
    protected $table = "partner_transaction_detail";

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
        $table->date('trn_date')->nullable();
        $table->string('particulars')->nullable();
        $table->decimal('debit', 20, 2)->default(0.00);
        $table->decimal('credit', 20, 2)->default(0.00);
    }
}

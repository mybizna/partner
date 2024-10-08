<?php

namespace Modules\Partner\Models\Data;

use Modules\Base\Classes\Datasetter;

class LifeStage
{
    /**
     * Set ordering of the Class to be migrated.
     *
     * @var int
     */
    public $ordering = 1;

    /**
     * Run the database seeds with system default records.
     *
     * @param Datasetter $datasetter
     *
     * @return void
     */
    public function data(Datasetter $datasetter): void
    {
        $datasetter->add_data('partner', 'life_stage', 'slug', [
            "title" => "Customer",
            "slug" => "customer",
            "title_plural" => "Customers",
            "position" => "1",
        ]);
        $datasetter->add_data('partner', 'life_stage', 'slug', [
            "title" => "Lead",
            "slug" => "lead",
            "title_plural" => "Leads",
            "position" => "2",
        ]);
        $datasetter->add_data('partner', 'life_stage', 'slug', [
            "title" => "Opportunity",
            "slug" => "opportunity",
            "title_plural" => "Opportunities",
            "position" => "3",
        ]);
        $datasetter->add_data('partner', 'life_stage', 'slug', [
            "title" => "Subscriber",
            "slug" => "subscriber",
            "title_plural" => "Subscribers",
            "position" => "4",
        ]);
    }
}

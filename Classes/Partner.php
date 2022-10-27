<?php

namespace Modules\Isp\Classes;

use Modules\Partner\Entities\Partner as DBPartner;
use Modules\Partner\Entities\Slug;

class Partner
{
    /**
     * $data [
    'first_name' => '',
    'last_name' => '',
    'email' => '',
    'phone' => '',
    'slug' => [],
    ]
     */
    public function createPartner($data)
    {
        $whereData = [];

        $slugs = (isset($data['slugs']) && !empty($data['slugs'])) ? $data['slugs'] : [];

        if (isset($data['email']) && $data['email'] != '') {
            $whereData[] = ['email', $data['email']];
        }

        if (isset($data['phone']) && $data['phone'] != '') {
            $whereData[] = ['phone', $data['phone']];
        }

        if (empty($whereData)) {
            throw new \Exception("Error: Partner Must have phone number or email", true);
        } else {
            $partner = DBPartner::where($whereData)->first();

            if (!$partner) {
                $partner = DBPartner::create($data);
            }

            
            $slugs[] = $partner->id;
            
            foreach ($slugs as $key => $slug) {
                $slug_where = [['partner_id', $partner->id], ['slug', $slug]];
                $partner_slugs = Slug::where($slug_where)->first();
                
                if (!$partner_slugs) {
                    Slug::create(['partner_id' => $partner->id, 'slug' => $slug]);
                }
            }
            
            return $partner;
        }

        return false;

    }
}

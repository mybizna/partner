<?php

namespace Modules\Partner\Classes;

use App\Models\User;
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
                $this->updatePartnerSlug($partner->id, $slug);
            }

            return $partner;
        }

        return false;

    }

    public function getPartner($partner_str)
    {
        $partner_slug = Slug::where('slug', $partner_str)->first();

        if ($partner_slug) {
            $partner = DBPartner::where('id', $partner_slug->partner_id)->first();
            if ($partner) {
                return $partner;
            }
        }

        $partner = DBPartner::where('email', $partner_str)
            ->orWhere('phone', $partner_str)
            ->orWhere('mobile', $partner_str)
            ->first();

        if ($partner) {

            $this->updatePartnerSlug($partner->id, $partner->email);
            $this->updatePartnerSlug($partner->id, $partner->phone);
            $this->updatePartnerSlug($partner->id, $partner->mobile);

            return $partner;
        } else {

            $user = User::where('username', $partner_str)
                ->orWhere('phone', $partner_str)
                ->orWhere('email', $partner_str)
                ->first();

            if ($user) {
                $partner = DBPartner::where('email', $user->email)
                    ->orWhere('phone', $user->phone)
                    ->orWhere('mobile', $user->phone)
                    ->first();

                if ($partner) {

                    $this->updatePartnerSlug($partner->id, $partner->email);
                    $this->updatePartnerSlug($partner->id, $partner->phone);
                    $this->updatePartnerSlug($partner->id, $partner->mobile);

                    return $partner;

                } else {

                    $name = explode(' ', $user->name);
                    $data = [
                        'first_name' => $name[0],
                        'last_name' => $name[1],
                        'email' => $user->email,
                        'phone' => $user->phone,
                        'slug' => [$user->username, $user->email, $user->phone],
                    ];

                    $partner = $this->createPartner($data);

                    if ($partner) {
                        return $partner;
                    }
                }
            }

        }

        return false;

    }

    public function updatePartnerSlug($partner_id, $slug)
    {

        if ($slug == '') {
            return;
        }

        $slug_where = [['partner_id', $partner_id], ['slug', $slug]];
        $partner_slugs = Slug::where($slug_where)->first();

        if (!$partner_slugs) {
            Slug::create(['partner_id' => $partner->id, 'slug' => $slug]);
        }

    }
}

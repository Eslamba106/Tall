<?php

namespace App\Repositories;

use App\Models\affiliateAdmin;

class AffiliateAdminRepository
{
    public function updateAffiliateStats($code, $price)
    {
        $affiliate = affiliateAdmin::where('code', $code)->first();
        if ($affiliate) {
            $affiliate->number2 += 1;
            $affiliate->total += $price;
            $affiliate->save();
        }
    }
}

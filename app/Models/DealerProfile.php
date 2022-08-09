<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DealerProfile extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'dealer_profiles';

    public static function dealerCategory($id = null)
    {
        // return $this->hasOne('App\Models\DealerCategory', 'id', 'id');
        $dealerCategory = DealerProfile::select('dealer_profiles.*','dealer_categories.percentage as percentage_dealer')
            ->join('dealer_categories','dealer_categories.id','=','dealer_profiles.dealer_category')
            ->where(["dealer_profiles.status"=>"active"]);
            if(!is_null($id))
            {
                $dealerCategory->where(["dealer_profiles.user_id"=>$id]);
                $dealerCategory = $dealerCategory->first();
            }else{
                $dealerCategory = $dealerCategory->get();
            }
        return $dealerCategory;
    }

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function getAllDealers($id = null)
    {
        return DealerProfile::where(["status"=>"active"])->get();
    }
}

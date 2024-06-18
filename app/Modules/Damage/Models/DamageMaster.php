<?php

namespace App\Modules\Damage\Models;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Modules\Status\Models\status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DamageMaster extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['damage_type', 'user_id', 'created_by', 'active', 'status_id'];


    public static function validate_rule()
    {
        return [
            'damage_type' => ['required',Rule::unique('damage_masters')->where(function ($query) {
                return $query->where('user_id',Auth::id());
            }),
        ],
        ];
    }

    public static function damage_data() {

        $damagesAll= DamageMaster::with('status')->get();
 
        return ['damages'=>$damagesAll,];
 
       }

       public function status() {
        return $this->hasOne(status::class,'id','damage_type');
       }
}

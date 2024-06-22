<?php

namespace app\Modules\Damage\Models;

use Illuminate\Validation\Rule;
use App\Modules\Status\Models\status;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Damage\Models\DamageMaster;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DamageDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['master_id', 'damage_specific', 'status_id',    'active', 'created_by', 'attachments'];

    public static function damages() {

         
    }

    public static function validate_rule($master_id)
    {
        return [
            'damage_specific' => [
                'required',
                Rule::unique('damage_details')->where(function ($query) use ($master_id) {
                    return $query->where('master_id', $master_id);
                }),
            ],
        ];
    }

    public function damageMaster() {
        return $this->hasone(DamageMaster::class,'id','master_id');
    }

    public function statusName() {
        return $this->hasone(status::class,'id','damage_specific');
    }
}

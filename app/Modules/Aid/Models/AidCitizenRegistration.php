<?php

namespace App\Modules\Aid\Models;

use App\Modules\Status\Models\status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AidCitizenRegistration extends Model
{
    use HasFactory;

    // function getDateFormatAttribute() {
    //     return date('d/m/Y',strtotime($this->birthday));
    // }

    public function maritalStatus() {
        return $this->hasOne(status::class,'id','marital_status');
    }
}

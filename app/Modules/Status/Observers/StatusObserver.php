<?php

namespace App\Modules\Status\Observers;

use App\Modules\Status\Models\status;
use Illuminate\Support\Facades\Cache;



class StatusObserver
{ 
    public function forgetCache() {
        Cache::forget('status');
    }

    public function created(status $status)
    {
        // $this->forgetCache();
       
    }

    public function updated(status $status)
    {
        //
    }

   public function deleted(status $status)
    {
        //
    }


    public function restored(status $status)
    {
        //
    }


    public function forceDeleted(status $status)
    {
        //
    }
}

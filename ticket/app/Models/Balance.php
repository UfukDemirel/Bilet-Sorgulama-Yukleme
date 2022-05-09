<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Balance extends Model
{
    protected $table = "balance";

    public function money(){
        return $this->select('*')
            ->where('users_id',Auth::id())
            ->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Catatan extends Model
{
    use HasFactory;

    protected $table = 'catatan';
    protected $guarded= [];

    public function User()
    {
        return $this->belongsTo('App\Models\User','user_id','id', User::class);
        
    }
}

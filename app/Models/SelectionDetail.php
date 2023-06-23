<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectionDetail extends Model
{
    use HasFactory;
                public function selection()
    {
        return $this->hasOne('App\Models\Selection', 'id','selection_id');

    }
}

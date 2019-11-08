<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ErrorReport extends Model
{

    protected $fillable = [
        'title', 'content', 'id_user', 'id_interest_category',
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestHistory extends Model
{

    protected $fillable = [
        'score', 'completed_time', 'id_user', 'id_test',
    ];

}

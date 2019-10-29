<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{

    protected $fillable = [
        'duration', 'id_article', 'id_test_category',
    ];

}

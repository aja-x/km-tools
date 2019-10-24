<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'title', 'content', 'last_edited', 'published_date', 'id_interest_category'
    ];

}

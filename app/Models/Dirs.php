<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dirs extends Model
{
    protected $fillable = [
        'name', 'author_id', 'files_ids', 'id_parentdirs', 'id_subdirs'
    ];
    protected $table = 'dirs';
}

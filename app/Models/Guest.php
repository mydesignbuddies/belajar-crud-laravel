<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guest extends Model
{
    //Untuk menggunakan softdeletes
    use SoftDeletes;
    protected $dates =['deleted-at'];

    // Untuk menggunakan kolom 'guestId' pada query pencarian di controller
    protected $primaryKey = 'guestId';
}

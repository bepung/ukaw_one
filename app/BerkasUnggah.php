<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BerkasUnggah extends Model
{
    protected $table = 'berkas_unggah';
    protected $fillable = ['filename', 'username'];
}

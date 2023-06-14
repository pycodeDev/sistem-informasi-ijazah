<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'detail_user';

    protected $fillable = [
        'user_id',
        'nim',
        'tgl_lahir',
        'tempat_lahir',
        'program_studi',
        'fakultas',
    ];
}

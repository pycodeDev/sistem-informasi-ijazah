<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ijazah extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'ijazah';

    protected $fillable = [
        'nim',
        'status',
        'nim_perwakilan',
        'upload_skl',
        'upload_pembayaran',
        'upload_surat_kuasa',
        'upload_ktp',
        'alasan',
        'name_approve',
        'surat_kuasa_pengambilan',
        'upload_foto_pengambilan',
        'nama_pengambil'
    ];
}

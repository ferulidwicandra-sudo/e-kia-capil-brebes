<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKia extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_kia';

    protected $fillable = [
        'nik_anak',
        'nama_lengkap_anak',
        'tanggal_lahir_anak',
        'nik_orang_tua',
        'file_dokumen_path',
        'status',
        'catatan',
    ];
}

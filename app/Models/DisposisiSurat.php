<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisposisiSurat extends Model
{
    use HasFactory;
    protected $table = 'disposisi_surat';
    protected $guarded = ['id'];
    public $dates = ['batas_waktu'];

    public function sifat()
    {
        return $this->belongsTo(SifatSurat::class,'sifat_surat_id','id');
    }

    public function suratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }

    public function klasifikasi()
    {
        return $this->belongsTo(Klasifikasi::class);
    }
}

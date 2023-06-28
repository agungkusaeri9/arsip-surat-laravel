<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk';
    protected $guarded = ['id'];
    public $dates = ['tanggal_surat','tanggal_diterima'];

    public function disposisis()
    {
        return $this->hasMany(DisposisiSurat::class,'surat_masuk_id');
    }


}

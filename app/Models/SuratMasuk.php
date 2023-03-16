<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk';
    protected $guarded = ['id'];

    public function disposisis()
    {
        return $this->hasMany(DisposisiSurat::class,'surat_masuk_id');
    }
}

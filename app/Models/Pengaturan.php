<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;
    protected $table = 'pengaturan';
    protected $guarded = ['id'];

    public function gambar()
    {
        if($this->gambar)
        {
            return asset('storage/' . $this->gambar);
        }else{
            return asset('assets/img/undraw_profile.svg');
        }
    }

    public function foto_pembuat()
    {
        if($this->foto_pembuat)
        {
            return asset('storage/' . $this->foto_pembuat);
        }else{
            return asset('assets/img/undraw_profile.svg');
        }
    }
}

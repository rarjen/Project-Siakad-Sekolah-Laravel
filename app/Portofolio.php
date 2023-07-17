<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portofolio extends Model
{
    use SoftDeletes;

    protected $fillable = ['siswa_id', 'url', 'deskripsi'];

    public function siswa()
    {
        return $this->belongsTo("App\Siswa")->withDefault();
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portofolio extends Model
{

    protected $table = 'portofolio';

    protected $fillable = ['siswa_id', 'url', 'deskripsi'];
    public $timestamps = false;

    public function siswa()
    {
        return $this->belongsTo("App\Siswa")->withDefault();
    }
}

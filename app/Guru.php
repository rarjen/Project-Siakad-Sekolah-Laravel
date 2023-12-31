<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Nilai;
class Guru extends Model
{
    protected $table = 'guru';
    use SoftDeletes;

    protected $fillable = ['id_card', 'nip', 'nama_guru', 'mapel_id', 'kode', 'jk', 'telp', 'tmp_lahir', 'tgl_lahir', 'foto'];

    public function mapel()
    {
        return $this->belongsTo('App\Mapel')->withDefault();
    }


}

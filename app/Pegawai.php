<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table ='pegawai';

    public $timestamps = false;

    public function kinerja(){
    	return $this->hasMany('App\Kinerja','pegawai_nip','nip');
    }
}

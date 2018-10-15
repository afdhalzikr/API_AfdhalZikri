<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{
    protected $table ='kinerja';

    public $timestamps = false;

    public function pegawai(){
    	return $this->hasMany('App\Pegawai','pegawai_nip','nip');
    }
}

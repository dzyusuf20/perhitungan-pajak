<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

namespace App\Models;

class Penghasilan
{
    public $penghasilanBruto;
    public $bebanTanggungan;
    public $ptkpPribadi;
    public $ptkpIstri;
    public $ptkpAnak;

    public function __construct($penghasilanBruto, $bebanTanggungan, $ptkpPribadi, $ptkpIstri, $ptkpAnak)
    {
        $this->penghasilanBruto = $penghasilanBruto;
        $this->bebanTanggungan = $bebanTanggungan;
        $this->ptkpPribadi = $ptkpPribadi;
        $this->ptkpIstri = $ptkpIstri;
        $this->ptkpAnak = $ptkpAnak;
    }

    public function hitungPenghasilanBersih()
    {
        return $this->penghasilanBruto - $this->bebanTanggungan;
    }

    public function hitungPTKP()
    {
        return $this->ptkpPribadi + $this->ptkpIstri + $this->ptkpAnak;
    }
}

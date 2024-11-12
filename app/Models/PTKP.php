<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PTKP
{
    protected $ptkpPribadi;
    protected $ptkpIstri;
    protected $ptkpAnak;

    public function __construct($ptkpPribadi, $ptkpIstri, $ptkpAnak)
    {
        $this->ptkpPribadi = $ptkpPribadi;
        $this->ptkpIstri = $ptkpIstri;
        $this->ptkpAnak = $ptkpAnak;
    }

    public function hitungPTKP()
    {
        return $this->ptkpPribadi + $this->ptkpIstri + $this->ptkpAnak;
    }
}

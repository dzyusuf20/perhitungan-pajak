<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenghasilanController extends Controller
{
    public function showForm()
    {
        return view('penghasilan.form');
    }

    public function hitungPPh(Request $request)
    {
        $request->validate([
            'penghasilan_bruto' => 'required|numeric|min:0',
            'beban_tanggungan' => 'required|numeric|min:0',
            'ptkp_pribadi' => 'required|numeric|min:0',
            'ptkp_istri' => 'required|numeric|min:0',
            'ptkp_anak' => 'required|numeric|min:0',
        ]);

        $data = $request->only([
            'penghasilan_bruto', 'beban_tanggungan', 'ptkp_pribadi', 'ptkp_istri', 'ptkp_anak'
        ]);

        $penghasilanBersih = $data['penghasilan_bruto'] - $data['beban_tanggungan'];
        $ptkp = $data['ptkp_pribadi'] + $data['ptkp_istri'] + $data['ptkp_anak'];
        $pkp = $penghasilanBersih - $ptkp;

        $pph = $pkp < 50000000 ? $pkp * 0.05 : $pkp * 0.1;

        $formattedData = [
            'formattedPenghasilanBersih' => number_format($penghasilanBersih, 0, ',', '.'),
            'formattedPtkp' => number_format($ptkp, 0, ',', '.'),
            'formattedPkp' => number_format($pkp, 0, ',', '.'),
            'formattedPph' => number_format($pph, 0, ',', '.')
        ];

        return view('penghasilan.hasil', $formattedData);
    }
}

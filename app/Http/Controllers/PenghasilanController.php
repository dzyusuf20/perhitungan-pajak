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
        // Menyimpan semua inputan dalam array
        $inputData = $request->only([
            'penghasilan_bruto', 'beban_tanggungan', 'ptkp_pribadi', 'ptkp_istri', 'ptkp_anak'
        ]);

        // Validasi input
        $this->validateInput($request);

        // Proses perhitungan
        $hasilPerhitungan = $this->hitungPerhitungan($inputData);

        // Format hasil perhitungan dalam format Rupiah
        $formattedData = $this->formatRupiah($hasilPerhitungan);

        // Menampilkan hasil pada view
        return view('penghasilan.hasil', $formattedData);
    }

    private function validateInput(Request $request)
    {
        $request->validate([
            'penghasilan_bruto' => 'required|numeric|min:0',
            'beban_tanggungan' => 'required|numeric|min:0',
            'ptkp_pribadi' => 'required|numeric|min:0',
            'ptkp_istri' => 'required|numeric|min:0',
            'ptkp_anak' => 'required|numeric|min:0',
        ]);
    }

    private function hitungPerhitungan(array $data)
    {
        // Menghitung penghasilan bersih
        $penghasilanBersih = $data['penghasilan_bruto'] - $data['beban_tanggungan'];
        
        // Menghitung PTKP
        $ptkp = $data['ptkp_pribadi'] + $data['ptkp_istri'] + $data['ptkp_anak'];

        // Menghitung PKP
        $pkp = $penghasilanBersih - $ptkp;

        // Menghitung PPh berdasarkan PKP
        $pph = ($pkp < 50000000) ? $pkp * 0.05 : $pkp * 0.1;

        return [
            'penghasilan_bersih' => $penghasilanBersih,
            'ptkp' => $ptkp,
            'pkp' => $pkp,
            'pph' => $pph
        ];
    }

    private function formatRupiah(array $data)
    {
        return [
            'formattedPenghasilanBersih' => number_format($data['penghasilan_bersih'], 0, ',', '.'),
            'formattedPtkp' => number_format($data['ptkp'], 0, ',', '.'),
            'formattedPkp' => number_format($data['pkp'], 0, ',', '.'),
            'formattedPph' => number_format($data['pph'], 0, ',', '.')
        ];
    }
}

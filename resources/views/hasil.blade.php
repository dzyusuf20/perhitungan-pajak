<!-- resources/views/form.blade.php -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penghasilan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 28px;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .form-control {
            font-size: 16px;
        }

        .btn-primary {
            background-color: #28a745;
            border: none;
            padding: 12px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            width: 100%;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #218838;
            cursor: pointer;
        }

        .btn-primary:focus {
            outline: none;
        }

        .result-container {
            margin-top: 30px;
            background-color: #fff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .result-item {
            margin-bottom: 15px;
        }

        .result-item p {
            font-size: 16px;
            color: #333;
        }

        .btn-secondary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-secondary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card p-4 shadow-lg">
        <h2 class="text-center">Form Penghasilan</h2>
        <form action="/hitung" method="POST" onsubmit="sanitizeForm()">
            @csrf
            <div class="mb-3">
                <label class="form-label">Penghasilan Bruto</label>
                <input type="text" name="penghasilan_bruto" id="penghasilan_bruto" class="form-control" oninput="formatRupiah(this)" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Beban Tanggungan</label>
                <input type="text" name="beban_tanggungan" id="beban_tanggungan" class="form-control" oninput="formatRupiah(this)" required>
            </div>

            <div class="mb-3">
                <label class="form-label">PTKP Pribadi</label>
                <input type="text" name="ptkp_pribadi" id="ptkp_pribadi" class="form-control" oninput="formatRupiah(this)" required>
            </div>

            <div class="mb-3">
                <label class="form-label">PTKP Istri</label>
                <input type="text" name="ptkp_istri" id="ptkp_istri" class="form-control" oninput="formatRupiah(this)" required>
            </div>

            <div class="mb-3">
                <label class="form-label">PTKP Anak</label>
                <input type="text" name="ptkp_anak" id="ptkp_anak" class="form-control" oninput="formatRupiah(this)" required>
            </div>

            <button type="submit" class="btn btn-primary">Hitung</button>
        </form>
    </div>

    <!-- Hasil Perhitungan -->
    <div class="result-container">
        <h4 class="text-center">Hasil Perhitungan PPh</h4>
        <div class="result-item">
            <p><strong>Penghasilan Bersih:</strong> Rp {{ $formattedPenghasilanBersih }}</p>
        </div>
        <div class="result-item">
            <p><strong>PTKP:</strong> Rp {{ $formattedPtkp }}</p>
        </div>
        <div class="result-item">
            <p><strong>PKP:</strong> Rp {{ $formattedPkp }}</p>
        </div>
        <div class="result-item">
            <p><strong>PPh yang harus dibayar:</strong> Rp {{ $formattedPph }}</p>
        </div>
        <a href="/form" class="btn-secondary">Kembali</a>
    </div>
</div>

<script>
    // Fungsi untuk format input sebagai Rupiah dengan titik pemisah ribuan
    function formatRupiah(input) {
        var value = input.value.replace(/[^,\d]/g, ''); // Menghapus karakter selain angka dan koma
        var split = value.split(',');
        var number = split[0];
        var decimal = split[1];

        // Format ribuan dengan titik
        number = number.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        if (decimal) {
            value = number + ',' + decimal;
        } else {
            value = number;
        }

        input.value = value;
    }

    // Fungsi untuk menghapus titik sebelum form disubmit
    function sanitizeForm() {
        // Hapus titik dari semua input
        var inputs = document.querySelectorAll('input[type="text"]');
        inputs.forEach(function(input) {
            input.value = input.value.replace(/\./g, '');  // Hapus titik
        });
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

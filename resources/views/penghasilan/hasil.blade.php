<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan PPh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fa;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            background-color: #fff;
        }

        h2 {
            font-size: 28px;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .result-item {
            margin-bottom: 15px;
        }

        .result-item p {
            font-size: 18px;
            font-weight: 500;
            color: #333;
        }

        .btn-back {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #218838;
            cursor: pointer;
        }

        .btn-back:focus {
            outline: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card shadow-lg">
            <h2 class="text-center">Hasil Perhitungan PPh</h2>

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

            <a href="/form" class="btn-back">Kembali</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

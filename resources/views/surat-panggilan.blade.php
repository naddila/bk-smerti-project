<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ url('/') }}">
    <title>Surat Panggilan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Untuk responsive -->
    <style>
        /* Global styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: white;
        }

        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .kop-surat h3,
        .kop-surat h2 {
            margin: 0;
            padding: 0;
        }

        .kop-surat h3 {
            font-size: 20px;
            font-weight: bold;
        }

        .kop-surat h2 {
            font-size: 24px;
            font-weight: bold;
            margin: 5px 0;
        }

        .kop-surat p {
            margin: 5px 0;
            font-size: 14px;
        }

        .container {
            margin: 0 auto;
            max-width: 600px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .perihal {
            text-align: left;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 18px;
        }

        .tanggal {
            text-align: right;
            font-weight: bold;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .content p {
            margin: 10px 0;
            line-height: 1.6;
            font-size: 16px;
        }

        .detail-section {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .detail-section span {
            display: inline-block;
            width: 100px;
            font-weight: bold;
        }

        .ttd {
            text-align: right;
            margin-top: 40px;
            font-style: italic;
            font-size: 16px;
        }

        hr {
            border: 1px solid #000;
            margin: 20px 0;
        }

        /* Media query untuk responsif di perangkat mobile */
        @media (max-width: 600px) {
            .container {
                padding: 10px;
                max-width: 100%;
            }

            .kop-surat img {
                max-width: 100%;
            }

            .tanggal {
                text-align: left;
            }

            .detail-section span {
                width: 80px; /* Mengurangi lebar pada mobile agar lebih fleksibel */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Kop Surat -->
        <div class="kop-surat">
            <h3>PEMERINTAH PROVINSI BALI</h3>
            <h2>SMA NEGERI 1 BATURITI</h2>
            <p>Alamat: Perean, Baturiti, Tabanan, Telp.(03616205155), Kode Pos. 82191.</p>
            <p>Email: sman1baturiti@gmail.com, Website: http://sman1baturiti.sch.id</p>
        </div>
        <hr><br>

        <!-- Perihal -->
        <div class="perihal">
            Perihal: Undangan
        </div>

        <!-- Tanggal -->
        <div class="tanggal">
            Baturiti, {{ $text }}
        </div>

        <!-- Pembukaan -->
        <div class="content">
            <p>Yth. Bapak/Ibu Orang Tua/Wali Murid</p>
            <p>{{ $penanganan->siswa->nama }}</p>
            <p>Kelas {{ $penanganan->siswa->kelas->nama_kelas }}</p>
            <p>di Tempat</p><br>

            <p>Dengan hormat,</p>
            <p>Sehubungan dengan adanya sesuatu yang perlu disampaikan kepada Bapak/Ibu, maka Kami mengundang
                Bapak/Ibu untuk hadir pada:</p>
        </div>

        <!-- Detail Undangan -->
        <div class="detail-section">
            <p><span>Hari</span>: {{ $hari }}</p>
            <p><span>Tanggal</span>: {{ $text }}</p>
            <p><span>Jam</span>: {{ $jam }} WITA - Selesai</p>
            <p><span>Tempat</span>: Ruang BK SMA Negeri 1 Baturiti</p>
        </div>

        <!-- Penutup -->
        <div class="content">
            <p>Mengingat sangat pentingnya hal di atas dimohon Bapak/Ibu untuk bersedia hadir tepat waktu. Atas
                perhatian dan kehadirannya Kami ucapkan terima kasih.</p>
        </div>

        <!-- Tanda Tangan -->
        <div class="ttd">
            Telah dibuat & disetujui oleh BK.
        </div>
    </div>
</body>

</html>

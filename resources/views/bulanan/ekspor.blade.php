<!DOCTYPE html>
<html>
<head>
    <title>Laporan Bulan {{ \Carbon\Carbon::parse('01-'.request()->bulan)->isoFormat('MMMM') }}</title>
    <style>
        .header-divider {
            border-bottom: 1px solid #000;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #ffd900;
        }
        th.text-uppercase {
            text-transform: uppercase;
            font-weight: bold;
        }
        th[rowspan="2"], th[colspan="3"] {
            background-color: #ffd900;
        }
        th[rowspan="2"] {
            text-transform: uppercase;
            font-weight: bold;
        }
        td.text-center {
            text-align: center;
        }
        .fs-5 {
            font-size: 1.25rem;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Buku Tamu SMK Negeri 2 Purwakarta</h1>
   <h2 style="text-align: center">Data Tamu Bulan {{ \Carbon\Carbon::parse('01-'.request()->bulan)->isoFormat('MMMM') }} Tahun {{ \Carbon\Carbon::parse('01-'.request()->bulan)->isoFormat('Y') }}</h2>
    <div class="header-divider"></div>

    <h4>{{ \Carbon\Carbon::parse('01-'.request()->bulan)->isoFormat('MMMM Y') }}</h4>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tujuan</th>
                <th>Tanggal & Waktu</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data['getRecord'] as $key => $value)
            <tr style="text-align: center;">
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->alamat }}</td>
                <td>{{ $value->tujuan }}</td>
                <td>{{ date('d-m-Y H:i:s', strtotime($value->created_at)) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center fs-5">Belum ada Data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    

    
    {{-- Apabila tanda tangan kepala sekolah atau pihak terkait diperlukan pada kertas hasil cetak --}}

    {{-- <div class="right-align">
        <br>
        <br>
        <p style="text-align: right">……………………………, …………………20…………</p>
        <br>Mengetahui,
        <br>
        <br>
        <div>
            Kepala Sekolah
        </div>
        <br>
        <br>
        <br>
        <br>
        <div>
            ( ……………… )
        </div>
    </div> --}}
</body>
</html>

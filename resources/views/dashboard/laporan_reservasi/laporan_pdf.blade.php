<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservasi PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h5>Laporan Reservasi Periode ({{ $date[0] }} - {{ $date[1] }})</h5>
    <hr>
    <table width="100%" class="table-hover table-bordered">
        <thead>
            <tr>
                <th>InvoiceID</th>
                <th>Pelanggan</th>
                <th>Subtotal</th>
                <th>Tanggal Check In</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @foreach($histories as $history)
                @if($history->isEmpty())
                 <tr>
                <td colspan="4" class="text-center">Tidak ada data</td>
                     </tr>
                @else
                <tr>
                    <td><strong>{{ $history[0]['kode_reservasi'] }}</strong></td>
                    <td>
                        <strong>Nama:{{$history[0]['user']['name']}}</strong><br>
                        <label><strong>Room:</strong>{{$history[0]['CategoryKamar']['nama_category']}}</label><br>
                    </td>
                    <td>${{$history[0]['ReservasiPembayaran']['harga']}}</td>
                    <td>{{ date('d, F Y H:i', strtotime($history[0]['check_in'])) }}</td>
                </tr>
                  @php $total += $history[0]['ReservasiPembayaran']['harga'] @endphp
                @endif
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">Total</td>
                <td>$ {{ number_format($total) }} </td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
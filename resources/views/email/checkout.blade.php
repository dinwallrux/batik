<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer</title>
    <link rel="stylesheet" type="text/css" href="{{asset('home')}}/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('home')}}/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="{{asset('home')}}/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h2>{{ $produkOrdered['order_number'] }}</h2>
                <p>Hai, {{ $orderName }}</p>
                <p>Tanggal Order: {{ $produkOrdered['created_at'] }}</p>
                <p>Kurir: {{ $produkOrdered['kurir'] }}</p>
                <p>Layanan: {{ $produkOrdered['layanan'] }}</p>
                <table class="table" border="1" width="100%">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: left;">Nama Produk</th>
                            <th scope="col" style="text-align: left;">Jumlah</th>
                            <th scope="col" style="text-align: left;">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produkOrdered->items as $item)
                        <tr>
                            <td style="text-align: left;">{{ $item->nama }}</td>
                            <td style="text-align: left;">{{ $item->pivot->quantity }}</td>
                            <td style="text-align: left;">Rp @convert($item->pivot->price * $item->pivot->quantity)</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"><b>Ongkir</b></td>
                            <td style="text-align: left;">Rp @convert($produkOrdered['ongkir'])</td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Total</b></td>
                            <td style="text-align: left;">Rp @convert($produkOrdered['grand_total'])</td>
                        </tr>
                    </tfoot>
                </table>

                <h4>Alamat Dikirim</h4>
                <p>{{ $produkOrdered['shipping_address'] }}</p>
                <p>{{ $produkOrdered['shipping_city'] }}</p>
                <p>{{ $produkOrdered['shipping_state'] }}</p>
                <p>{{ $produkOrdered['shipping_zipcode'] }}</p>

                <h4>Informasi Customer</h4>
                <p>{{ $produkOrdered['shipping_phone'] }}</p>
                <p>{{ $produkOrdered['shipping_email'] }}</p>

                <h4>Informasi No Rekening Yanto Batik</h4>
                <p>Bank: BCA</p>
                <p>Atas Nama: Yanto Batik</p>
                <p>No Rekening: 123456789</p>

                <h4>Proses pengerjaan produk yang diorder maksimal paling lambat 7 hari</h4>
                <h4>Apabila produk yang sudah diterima rusak / tidak sesuai bisa langsung mengirim email ke yantobatik@mail.com</h4>
            </div>
        </div>
    </div>
</body>
</html>

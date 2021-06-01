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
                <table class="table" border="1" width="100%">
                    <thead>
                        <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produkOrdered->items as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->pivot->quantity }}</td>
                            <td>Rp.@convert($item->pivot->price * $item->pivot->quantity)</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">Total</td>
                            <td>Rp.@convert($produkOrdered['grand_total'])</td>
                        </tr>
                    </tfoot>
                </table>

                <h6>Alamat Dikirim</h6>
                <p>{{ $produkOrdered['shipping_address'] }}</p>
                <p>{{ $produkOrdered['shipping_city'] }}</p>
                <p>{{ $produkOrdered['shipping_state'] }}</p>
                <p>{{ $produkOrdered['shipping_zipcode'] }}</p>

                <h6>Informasi Customer</h6>
                <p>{{ $produkOrdered['shipping_phone'] }}</p>
                <p>{{ $produkOrdered['shipping_email'] }}</p>
            </div>
        </div>
    </div>
</body>
</html>

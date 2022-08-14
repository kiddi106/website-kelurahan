<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('css/invoices.css')  }}">

    <title>Invoice..!</title>
</head>
<style>
    :root {
    --body-bg: rgb(204, 204, 204);
    --white: #ffffff;
    --darkWhite: #ccc;
    --black: #000000;
    --dark: #615c60;
    --themeColor: #22b8d1;
    --pageShadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    --webkit-print-color-adjust: exact;
}

/* Font Include */
@import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@600&display=swap');

body {
    background-color: var(--body-bg);
}


.page {
    background: var(--white);
    display: block;
    margin: 0 auto;
    position: relative;
    box-shadow: var(--pageShadow);
}

.page[size="A4"] {
    width: 21cm;
    height: 29.7cm;
    overflow: hidden;
}

.bb {
    border-bottom: 3px solid var(--darkWhite);
}

/* Top Section */
.top-content {
    padding-bottom: 15px;
}

.logo img {
    height: 140px;
}

.top-mid {
    height: auto;
    width: 700px;
    justify-content: center;
    align-items: center;
    margin: 0;
    
}
.top-mid .content{
    text-align: center;
    color: black
}
.top-mid .content h5{
    font-size: 1rem;
    margin:0;
    padding-bottom: 3px
}
.top-mid .content span{
    font-size: 1rem;
    font-weight: 800;
}
.top-mid .content p{
    font-size: 0.8rem;
    font-weight: 500;
    margin: 0;
}
.top-mid .content h4{
    font-size: 1.2rem;
    font-weight: 700;
    margin: 0;
}

.top-left p {
    margin: 0;
}

.top-left .graphic-path {
    height: 40px;
    position: relative;
}

.top-left .graphic-path::before {
    content: "";
    height: 20px;
    background-color: var(--dark);
    position: absolute;
    left: 15px;
    right: 0;
    top: -15px;
    z-index: 2;
}

.top-left .graphic-path::after {
    content: "";
    height: 22px;
    width: 17px;
    background: var(--black);
    position: absolute;
    top: -13px;
    left: 6px;
    transform: rotate(45deg);
}

.top-left .graphic-path p {
    color: var(--white);
    height: 40px;
    left: 0;
    right: -100px;
    text-transform: uppercase;
    background-color: var(--themeColor);
    font: 26px;
    z-index: 3;
    position: absolute;
    padding-left: 10px;
}

/* User Store Section */
.store-user {
    padding-bottom: 25px;
}

.store-user p {
    margin: 0;
    font-weight: 600;
}

.store-user .address {
    font-weight: 400;
}

.store-user h2 {
    color: var(--themeColor);
    font-family: 'Rajdhani', sans-serif;
}

.extra-info p span {
    font-weight: 400;
}

/* Product Section */
thead {
    color: var(--white);
    background: grey;
}

.table td,
.table th {
    text-align: center;
    vertical-align: middle;
}

tr th:first-child,
tr td:first-child {
    text-align: left;
}

.media img {
    height: 60px;
    width: 60px;
}

.media p {
    font-weight: 400;
    margin: 0;
}

.media p.title {
    font-weight: 600;
}

/* Balance Info Section */
.balance-info .table td,
.balance-info .table th {
    padding: 0;
    border: 0;
}

.balance-info tr td:first-child {
    font-weight: 600;
}

tfoot {
    border-top: 2px solid var(--darkWhite);
}

tfoot td {
    font-weight: 600;
}

/* Cart BG */
.cart-bg {
    height: 250px;
    bottom: 32px;
    left: -40px;
    opacity: 0.3;
    position: absolute;
}

/* Footer Section */
footer {
    text-align: center;
    position: absolute;
    bottom: 30px;
    left: 75px;
}

footer hr {
    margin-bottom: -22px;
    border-top: 3px solid var(--darkWhite);
}

footer a {
    color: var(--themeColor);
}

footer p {
    padding: 6px;
    border: 3px solid var(--darkWhite);
    background-color: var(--white);
    display: inline-block;
}

</style>
<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="{{ asset('assets/img/Picture1.png') }}" alt= class="img-fluid">
                </div>
                <div class="top-mid">
                    <div class="content">
                        <h5>PEMERINTAH PROVINSI DAERAH KHUSUS IBUKOTA JAKARTA</h5>
                        <h5>KOTA ADMINISTRASI JAKARTA TIMUR</h5>
                        <h5>KECAMATAN MATRAMAN</h5>
                        <h5><span>KELURAHAN PISANGAN BARU</span></h5>
                        <p>Jl. Pisangan Baru Utara – Telp 8505372 Fax : 021 - 8516161</p>
                        <p>e-mail : kel_pisanganbaru@jakarta.go.id</p> 
                        <h4>J A K A R T A </h4>

                    </div>
                </div>
                
            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <p>Dear,</p>
                            <h4>{{ $user->name }}</h4>
                            <p class="address"></p>
                            
                        </div>
                        <div class="col-5">
                            <p>Pekerja,</p>
                            {{-- <h2></h2> --}}
                            <p class="address"> Petugas PPSU </p>
                            
                        </div>
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>Title: <span>Laporan kinerja pekerja</span></p>
                        </div>
                        <div class="col-5">
                            {{-- <p>Deliver Date: <span></span></p> --}}
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Penilaian</td>
                            <td>Nilai</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="media-body">
                                        @foreach ($kinerja as $item)
                                            <h5>{{ $item->soal }}</h5>
                                        @endforeach
                                    </div>
                                </div>
                            </td>
                            <td>
                                @foreach ($kinerja as $item =>$value)
                                    @if ($any)
                                    
                                    <h5>{{ $value->nilai }}</h5>
                                    @else
                                    <p>No Have Report Yet</p>
                                    @endif
                                    @endforeach
                                    
                                
                            </td>
                            <td>
                                @foreach ($kinerja as $item =>$value)
                                <h5>{{ $value->type}}</h5>
                                @endforeach
                            </td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    <div class="col-8">
                        <p class="m-0 font-weight-bold"> Note: </p>
                        <p>Pembelian barang yang sudah dilakukan tidak dapat ditukarkan kembali atau dikembalikan, Terimakasih</p>
                    </div>
                    <div class="col-4">
                        

                        <!-- Signature -->
                        <div class="col-12">
                            <img src="{{ asset('assets/img/signature.jpg') }}" class="img-fluid" alt="">
                            <p class="text-center m-0"> Panitia Terkait </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Cart BG -->
            <img src="{{ asset('/img/cart.jpg') }}" class="img-fluid cart-bg" alt="">

            <footer >
                <hr>
                
                
            </footer>
        </div>
    </div>


</body></html>
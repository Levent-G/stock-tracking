@section('title','stokdurum')
<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body>
    <div id="screen">
        <div class="loader"></div>
    </div>
    @include('layouts.sidenav')
    <div id="main" style="margin-left:10%;">
        @include('layouts.topnav')

        <seciton>
            <div class="container">

                <div class="container" style="height:100%; ">
                    <div class="card-header" style="height:150px; ">
                        <h2 class="mb-5" style="text-align:center;color:#092756;">STOK DURUMU<h2>
                                <a href="{{route('stokDurum')}}" class="btn btn-danger urunlerbtn1">Stoğu azalan ürünler</a>
                                <a href="{{route('filtre1','depo1')}}" class="btn btn-success urunlerbtn1">DEPO1 LİSTELE</a>
                                <a href="{{route('filtre1','depo2')}}" class="btn btn-success urunlerbtn1">DEPO2 LİSTELE</a>
                                <a href="{{route('filtre1','depo3')}}" class="btn btn-success urunlerbtn1">DEPO3 LİSTELE</a>
                                <a href="{{route('filtre1','depo4')}}" class="btn btn-success urunlerbtn1">DEPO4 LİSTELE</a>



                                <h5 class="total">ÜRÜN SAYISI=
                                    <?php
                                    if ($_SESSION['filtreT']) {
                                        echo $_SESSION['stokkotuDurumSayısı'];
                                    }
                                    if ($_SESSION['filtreD']) {
                                        echo $_SESSION['depostoksayisi'];
                                    }
                                    ?> ADET.</h5>
                    </div>
                    <!-- TOPLAM STOGU AZ OLAN ÜRÜNLER  START-------------------------------------------------------->
                    <div class="container ">

                        <?php if ($_SESSION['filtreT']) { ?>

                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">Ürün Resmi</th>
                                        <th scope="col">Ürün İsmi</th>
                                        <th scope="col">Ürün Adedi</th>
                                        <th scope="col">Ürün Seri Numara</th>
                                        <th scope="col">Ürün Depo</th>
                                        <th scope="col">Ürün Barkodu</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                @foreach($filtre as $filtres)
                                <tbody>
                                    <tr>


                                        <td> <img src="{{asset('assets')}}/img/{{$filtres->image}}" class="card-img mr-5 urunimg" alt="..."></td>
                                        <td style="font-size:20px;">{{$filtres->urunAdi}}</td>
                                        <td style="font-size:20px;background-color:whitesmoke;color:red;">{{$filtres->urunAdet}}<a href="{{route('stokYenile',$filtres->urunSeriNo)}}" class="btn btn-danger ml-5" style="float:right;font-size:15px;">STOK YENİLE</td>
                                        <td style="font-size:20px;color:grey;">{{$filtres->urunSeriNo}}</td>
                                        <td style="font-size:20px;">{{$filtres->depo}}</td>
                                        <td style="font-size:20px;"><img src="{{$filtres->urunBarkod}}" class="qr-code img-thumbnail img-responsive"></td>
                                        <td> <a href="{{route('urunIncele',$filtres->urunSeriNo)}}" class="btn btn-primary urunlerbtn">İNCELE</a>
                                        </td>
                                    </tr>

                                </tbody>
                                @endforeach
                            </table>

                        <?php } ?>
                        <!-- TOPLAM STOGU AZ OLAN ÜRÜNLER  END-------------------------------------------------------->

                        <!-- DEPODA STOGU AZ OLAN ÜRÜNLER  START-------------------------------------------------------->
                        <?php if ($_SESSION['filtreD']) { ?>

                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">Ürün Resmi</th>
                                        <th scope="col">Ürün İsmi</th>
                                        <th scope="col">Ürün Adedi</th>
                                        <th scope="col">Ürün Seri Numara</th>
                                        <th scope="col">Ürün Depo</th>
                                        <th scope="col">Ürün Barkodu</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                @foreach($filtre1 as $filtres)
                                <tbody>
                                    <tr>


                                        <td> <img src="{{asset('assets')}}/img/{{$filtres->image}}" class="card-img mr-5 urunimg" alt="..."></td>
                                        <td style="font-size:20px;">{{$filtres->urunAdi}}</td>
                                        <td style="font-size:20px;background-color:whitesmoke;color:red;">{{$filtres->urunAdet}}<a href="{{route('stokYenile')}}" class="btn btn-danger ml-5" style="float:right;font-size:15px;">STOK YENİLE</td>
                                        <td style="font-size:20px;color:grey;">{{$filtres->urunSeriNo}}</td>
                                        <td style="font-size:20px;">{{$filtres->depo}}</td>
                                        <!-- düzelttttttt -------------------------------- -->
                                        <td style="font-size:20px;"> <img src="{{$filtres->urunBarkod}}" class="qr-code img-thumbnail img-responsive"></td>
                                        <td> <a href="{{route('urunIncele',$filtres->urunSeriNo)}}" class="btn btn-primary urunlerbtn">İNCELE</a>
                                        </td>
                                    </tr>

                                </tbody>
                                @endforeach
                            </table>
                        <?php } ?>
                        <!-- DEPODA STOGU AZ OLAN ÜRÜNLER  END-------------------------------------------------------->

                    </div>
                </div>
            </div>
        </seciton>



    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="{{asset('assets')}}/js/main.js"></script>
</body>

</html>
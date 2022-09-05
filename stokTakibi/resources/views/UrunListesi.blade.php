@section('title','Ürün Listesi')
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
                        <h2 class="mb-5" style="text-align:center;color:#092756;">ÜRÜNLER LİSTESİ<h2>

                                <a href="{{route('UrunListesi')}}" class="btn btn-success urunlerbtn1">TÜMÜNÜ LİSTELE</a>
                                <a href="{{route('qrKontrol')}}" class="btn btn-success urunlerbtn1">QR KODU OLMAYANLARI LİSTELE</a>
                                <a href="{{route('UrunDepo','depo1')}}" class="btn btn-success urunlerbtn1">DEPO1 LİSTELE</a>
                                <a href="{{route('UrunDepo','depo2')}}" class="btn btn-success urunlerbtn1">DEPO2 LİSTELE</a>
                                <a href="{{route('UrunDepo','depo3')}}" class="btn btn-success urunlerbtn1">DEPO3 LİSTELE</a>
                                <a href="{{route('UrunDepo','depo4')}}" class="btn btn-success urunlerbtn1">DEPO4 LİSTELE</a>




                                <h5 class="total">ÜRÜN ÇEŞİDİ SAYISI=
                                    <?php
                                    if (!($_SESSION['filtreT']) && !($_SESSION['depoT']) && !($_SESSION['qrKontrol'])) {
                                        echo  $_SESSION['urunlerSayisi'];
                                    ?></br> <?php echo 'Urunlerin Toplam sayisi=' . $_SESSION['urunlerToplamSayisi']  ?> <?php
                                                                                                                        }
                                                                                                                        if ($_SESSION['depoT']) {
                                                                                                                            echo  $_SESSION['depoUrunSayisi'];
                                                                                                                        }
                                                                                                                        if ($_SESSION['qrKontrol']) {
                                                                                                                            echo $_SESSION['barkodsuzUrunler'];
                                                                                                                        }
                                                                                                                            ?> ADET.</h5>
                    </div>
                    <!-- TOPLAM  ÜRÜNLER  START-------------------------------------------------------->
                    <div class="container ">
                        <?php if (!($_SESSION['filtreT']) && !($_SESSION['depoT']) && !($_SESSION['qrKontrol'])) { ?>
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
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                @foreach($urunlerlist as $urunler)
                                <tbody>
                                    <tr>


                                        <td> <img src="{{asset('assets')}}/img/{{$urunler->image}}" class="card-img mr-5 urunimg" alt="..."></td>
                                        <td style="font-size:20px;">{{$urunler->urunAdi}}</td>
                                        <td style="font-size:20px;background-color:whitesmoke;">{{$urunler->urunAdet}}</td>
                                        <td style="font-size:20px;color:grey;">{{$urunler->urunSeriNo}}</td>
                                        <td style="font-size:20px;">{{$urunler->depo}}</td>

                                        <td> <img src="{{$urunler->urunBarkod}}" class="qr-code img-thumbnail img-responsive"></td>
                                        <td> <a href="{{route('urunIncele',$urunler->urunSeriNo)}}" class="btn btn-primary urunlerbtn">İNCELE</a></td>
                                        @if($_SESSION['qrKontrol'])
                                        <td> <a href="{{route('qrEkle',$urunler->urunSeriNo,true)}}" class="btn btn-primary urunlerbtn">QR EKLE</a></td>
                                        @endif
                                    </tr>

                                </tbody>
                                @endforeach
                            </table>
                        <?php } ?>
                        <!-- TOPLAM  ÜRÜNLER  END-------------------------------------------------------->
                        <!-- DEPODAKİ ÜRÜNLER  START-------------------------------------------------------->
                        <?php if (($_SESSION['depoT'])) { ?>


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
                                @foreach($depoName as $depoUrunler)
                                <tbody>
                                    <tr>


                                        <td> <img src="{{asset('assets')}}/img/{{$depoUrunler->image}}" class="card-img mr-5 urunimg" alt="..."></td>
                                        <td style="font-size:20px;">{{$depoUrunler->urunAdi}}</td>
                                        <td style="font-size:20px;background-color:whitesmoke;">{{$depoUrunler->urunAdet}}</td>
                                        <td style="font-size:20px;color:grey;">{{$depoUrunler->urunSeriNo}}</td>
                                        <td style="font-size:20px;">{{$depoUrunler->depo}}</td>
                                        <td style="font: size 20px;"> <img src="{{$depoUrunler->urunBarkod}}" class="qr-code img-thumbnail img-responsive"></td>
                                        <td> <a href="{{route('urunIncele',$depoUrunler->urunSeriNo)}}" class="btn btn-primary urunlerbtn">İNCELE</a>
                                            @if(!($_SESSION['qrKontrol']))
                                        <td> <a href="{{route('qrEkle',$depoUrunler->urunSeriNo,true)}}" class="btn btn-primary urunlerbtn">QR EKLE</a></td>
                                        @endif
                                        </td>
                                    </tr>

                                </tbody>
                                @endforeach
                            </table>




                        <?php } ?>
                        <!-- DEPODAKİ ÜRÜNLER  END----------------------------------------------->
                        <!-- QR KODU OLMAYAN ÜRÜNLER  START----------------------------------------------->
                        <?php if (($_SESSION['qrKontrol'])) { ?>


                            <table class="table">
                                <thead>
                                    <tr>

                                        <th scope="col">Ürün Resmii</th>
                                        <th scope="col">Ürün İsmi</th>
                                        <th scope="col">Ürün Adedi</th>
                                        <th scope="col">Ürün Seri Numara</th>
                                        <th scope="col">Ürün Depo</th>
                                        <th scope="col">Ürün Barkodu</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                @foreach($qrKontrol as $qrKontrols)
                                <tbody>
                                    <tr>


                                        <td> <img src="{{asset('assets')}}/img/{{$qrKontrols->image}}" class="card-img mr-5 urunimg" alt="..."></td>
                                        <td style="font-size:20px;">{{$qrKontrols->urunAdi}}</td>
                                        <td style="font-size:20px;background-color:whitesmoke;">{{$qrKontrols->urunAdet}}</td>
                                        <td style="font-size:20px;color:grey;">{{$qrKontrols->urunSeriNo}}</td>
                                        <td style="font-size:20px;">{{$qrKontrols->depo}}</td>
                                        <td style="font-size:20px;"> <img src="{{$qrKontrols->urunBarkod}}" class="qr-code img-thumbnail img-responsive"></td>
                                        <td> <a href="{{route('urunIncele',$qrKontrols->urunSeriNo)}}" class="btn btn-primary urunlerbtn">İNCELE</a>
                                        <td> <a href="{{route('qrEkle',$qrKontrols->urunSeriNo)}}" class="btn btn-primary urunlerbtn">QR EKLE</a></td>
                                        </td>
                                    </tr>

                                </tbody>
                                @endforeach
                            </table>




                        <?php } ?>

                        <!-- QR KODU OLMAYAN ÜRÜNLER  END----------------------------------------------->

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
@section('title','Ürün Ekle')
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

        <section>

            <div class="container">
                <div class="card-header" style="height:100%; background-color:#092756; ">
                    <h2 class="mb-5" style="text-align:center;color:white;">QR CODE EKLE<h2>
                            <div class="container" style="width:500px;padding:20px;">

                                <form action="{{route('qrBilgiler')}}" method="POST" enctype="multipart/form-data" style="padding:20px;">
                                    @csrf
                                    <div class="form-group">
                                        <label for="formFile" class="form-label eklelabel">Ürün Bilgileri:</label>
                                        <input style="width:700px;" class="form-control eklelabel " id="exampleFormControlTextarea1" rows="3" name="qrBilgiler" value="Ürün Adi:{{$urunListesi->urunAdi}}   Ürün Adedi:{{$urunListesi->urunAdet}}     Depo:{{$urunListesi->depo}}    urunSeriNo::{{$urunListesi->urunSeriNo}}"></input>

                                    </div>
                                    <div class="form-group">
                                        <label for="formFile" class="form-label eklelabel">Ürün Seri Numarası:</label>
                                        <input class="form-control eklelabel" id="" rows="1" name="urunSeriNo1" value=" {{$urunListesi->urunSeriNo}}">

                                    </div>
                                    <button type="submit" class="btn btn-primary mt-5 eklelabel" style="width:100%;"> QR EKLE</button>
                                </form>

                                @if($_SESSION['yuklemeBasariliqr'])
                                <div class="alert alert-success" role="alert" style="text-align:center;">
                                    <h4> QR YÜKLEME BAŞARILI</h4>
                                    <img src="{{ $_SESSION['qrUzanti']}}">
                                </div>
                                @endif









                            </div>

                </div>

                <div style="margin:10px;float:right;"> <a href="{{route('UrunListesi')}}" class="btn btn-primary urunlerbtn">Ürün Listeye Geri Dön</a></div>

            </div>



        </section>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="{{asset('assets')}}/js/main.js"></script>
</body>

</html>
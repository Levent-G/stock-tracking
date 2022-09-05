@section('title','stokYenile')
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

        <div id="main" style="margin-left:10%;">
            @include('layouts.topnav')


            <section>
                <div class="container">


                    <div class="card p-3 mt-5 urunler">
                        <h1 style="font-size:100px important!;"> STOK YENİLE</h1>
                        <img src="{{asset('assets')}}/img/{{$urun->image}}" class="card-img mr-5 urunimg m-5" alt="..."></img>
                        <div class="soldiv">
                            <h5 class="card-text m-2 p-3 text" style="background-color:whitesmoke;color:black;font-size:20px;">Ürün İsmi:
                                <p style="font-size:20px;color:#092756;"> {{$urun->urunAdi}}</p>
                            </h5>

                            <h6 class="card-text m-2 p-3 text" style="background-color:lightgrey;color:black;font-size:20px;">Ürün Adedi: <a href="#" class="btn btn-danger ml-5" style="float:right;font-size:15px;" data-bs-toggle="modal" data-bs-target="#exampleModal">STOK YENİLE</a>
                                <p style="font-size:20px;color:#0645aa;">{{$urun->urunAdet}}</p>
                            </h6>
                            <h6 class="card-text p-3 m-2 text" style="background-color:whitesmoke;color:black;font-size:20px;">Ürün Seri Numarası:
                                <p style="font-size:20px;color:#0645aa;">{{$urun->urunSeriNo}}</p>
                            </h6>
                            <h6 class="card-text p-3 m-2 text" style="background-color:whitesmoke;color:black;font-size:20px;">Ürün Depo:
                                <p style="font-size:20px;color:#0645aa;">{{$urun->depo}}</p>
                            </h6>

                            <h6 class="card-text p-3 m-2 text">Ürün Barkodu: <img src="{{$urun->urunBarkod}}" class="qr-code img-thumbnail img-responsive"></h6> <a href="{{route('qrEkle',$urun->urunSeriNo,false)}}" class="btn btn-primary urunlerbtn">QR Güncelle</a>



                        </div>

                    </div>
                    <!-- MODALLL  START------------ -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Güncelleme İşlemleri</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{route('stokYenileFunction',$urun->urunSeriNo)}}" method="POST" enctype="multipart/form-data">
                                        @csrf


                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="form-label modalform">Satın aldığınız ürün adedi giriniz.:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="urunAdet"></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="form-label modalform">Ürünü satın aldığınız fiyatı yazınız.:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="maliyet"></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="form-label modalform">Ürünü satın aldığınız firmayı yazınız.:</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="firmaAdi"></textarea>

                                        </div>






                                        <button type="submit" class="btn btn-success">Satın Al</button>
                                    </form>

                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İPTAL</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    @if($_SESSION['guncellemeBasarili1'])
                    <div class="alert alert-success" role="alert">
                        Güncelleme BAŞARILI
                    </div>
                    <div class="alert alert-danger" role="alert">
                        QR Güncelle!
                    </div>
                    @endif
                    <!-- MODALLL  END------------ -->
            </section>



        </div>
        <hr>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="{{asset('assets')}}/js/main.js"></script>
</body>

</html>
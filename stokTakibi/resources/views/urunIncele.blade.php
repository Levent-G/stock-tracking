@section('title','ÜRÜN İNCELE')
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


                <div class="card p-3 mt-5 urunler">
                    <img src="{{asset('assets')}}/img/{{$incele->image}}" class="card-img mr-5 urunimg m-5" alt="..."><a href="{{route('urunIncele')}}" class="btn btn-primary urunlerbtn" style="float:right;width:300px; " data-bs-toggle="modal" data-bs-target="#exampleModal">RESİM GÜNCELLE</a></img>
                    <div class="soldiv">
                        <h5 class="card-text m-2 p-3 text" style="background-color:lightgrey;color:black;font-size:20px;">Ürün İsmi: <a href="{{route('urunIncele')}}" class="btn btn-primary urunlerbtn" style="float:right;" data-bs-toggle="modal" data-bs-target="#exampleModal">GÜNCELLE</a>
                            <p style="font-size:20px;color:#092756;"> {{$incele->urunAdi}}</p>
                        </h5>

                        <h6 class="card-text m-2 p-3 text" style="background-color:whitesmoke;color:black;font-size:20px;">Ürün Adedi: <a href="{{route('urunIncele')}}" class="btn btn-primary urunlerbtn" style="float:right;" data-bs-toggle="modal" data-bs-target="#exampleModal">GÜNCELLE</a>
                            <p style="font-size:20px;color:#0645aa;">{{$incele->urunAdet}}</p>
                        </h6>
                        <h6 class="card-text p-3 m-2 text" style="background-color:whitesmoke;color:black;font-size:20px;">Ürün Seri Numarası: <a href="{{route('urunIncele')}}" class="btn btn-primary urunlerbtn" style="float:right;" data-bs-toggle="modal" data-bs-target="#exampleModal">GÜNCELLE</a>
                            <p style="font-size:20px;color:#0645aa;">{{$incele->urunSeriNo}}</p>
                        </h6>
                        <h6 class="card-text p-3 m-2 text" style="background-color:whitesmoke;color:black;font-size:20px;">Ürün Depo: <a href="{{route('urunIncele')}}" class="btn btn-primary urunlerbtn" style="float:right;" data-bs-toggle="modal" data-bs-target="#exampleModal">GÜNCELLE</a>
                            <p style="font-size:20px;color:#0645aa;">{{$incele->depo}}</p>
                        </h6>

                        <h6 class="card-text p-3 m-2 text">Ürün Barkodu: <img src="{{$incele->urunBarkod}}" class="qr-code img-thumbnail img-responsive"><a href="{{route('urunIncele')}}" class="btn btn-primary urunlerbtn" style="float:right;" data-bs-toggle="modal" data-bs-target="#exampleModal">GÜNCELLE</a></h5>



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

                                <form action="{{route('urunGuncellemeIslemeri')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="formFile" class="form-label modalform">Ürün Resim Güncelle:</label>
                                        <input class="form-control" type="file" id="formFile" name="image">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="form-label modalform">Ürün Adı Güncelle:</label>
                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="urunAdi" value="{{$incele->urunAdi}}"></input>
                                        <div class="alert alert-danger" role="alert">
                                            İsim Güncelleme Tavsiye Edilmez.(ürün resmini tekrardan güncellemeniz gerekir!!)
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="form-label modalform">Ürün Adedi Güncelle:</label>
                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="urunAdet" value="{{$incele->urunAdet}}"></input>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="form-label modalform"> Ürün Seri Numara :</label>
                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="urunSeriNo" value="{{$incele->urunSeriNo}}"></input>
                                        <div class="alert alert-danger" role="alert">
                                            SERİ NUMARLARI GÜNCELLEYEMEZSİNİZ.

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="form-label modalform"> Depo Güncelle :</label>
                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="depo" value="{{$incele->depo}}"></input>

                                    </div>



                                    <a href="{{route('qrEkle',$incele->urunSeriNo,false)}}" class="btn btn-primary urunlerbtn">QR Güncelle</a>
                                    <button type="submit" class="btn btn-primary">Güncelle</button>
                                    <div class="alert alert-danger" role="alert">
                                        Ürünü Güncelledikten sonra qr kodunu güncellemeyi UNUTMAYINIZ!!!

                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İPTAL</button>

                            </div>
                        </div>
                    </div>
                </div>
                @if($_SESSION['guncellemeBasarili'])
                <div class="alert alert-success" role="alert">
                    Güncelleme BAŞARILI
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
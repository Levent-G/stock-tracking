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
                    <h2 class="mb-5" style="text-align:center;color:white;">ÜRÜN EKLE<h2>
                            <div class="container" style="width:500px;">

                                <form action="{{route('urunEklemeIslemi')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="formFile" class="form-label eklelabel">Ürün Resim:</label>
                                        <input class="form-control" type="file" id="formFile" name="image">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="form-label eklelabel">Ürün Adı:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="urunAdi"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="form-label eklelabel">Ürün Adedi:</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="urunAdet"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1" class="form-label eklelabel">Hangi Depoya Eklensin :</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="depo"></textarea>

                                    </div>


                                    <button type="submit" class="btn btn-primary" style="width:100%;">EKLE</button>
                                    <small id="emailHelp" class="form-text text-muted" style="font-size:17px;">Ürünlerin Seri Numaraları Otomatik ayarlanır.</small>
                                </form>
                            </div>

                </div>
                @if($_SESSION['yuklemeBasarili'])
                <div class="alert alert-success" role="alert">
                    YÜKLEME BAŞARILI
                </div>
                @endif

            </div>
        </section>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="{{asset('assets')}}/js/main.js"></script>
</body>

</html>
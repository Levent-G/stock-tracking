@section('title','stokGeçmişi')
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

        <div class="card-header" style="height:150px; ">
            <h2 class="mb-5" style="text-align:center;color:#092756;font-size:25px !important;"> Stok Geçmişi<h2>


                    <h5 class="total">Stok İşlem Sayısı=<?php echo $_SESSION['stokIslemSayisi'] ?> ADET.</h5>
        </div>
        <div class="container">
            <div class="form mt-5" style="margin-left:100px;">
                <form action="{{route('stokGecmisiTable')}}" method="post">
                    @csrf

                    <h1 style="font-size:20px !important;">UrunAdi Giriniz</h1>

                    <input type="text" name="urunAdi" style="width:100%;">
                    <button type="submit" class="btn btn-success mt-2" style="width:100%;">Ara</button>
                </form>
            </div>

        </div>




    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="{{asset('assets')}}/js/main.js"></script>
</body>

</html>
@section('title','stokMaliyet')
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
            <h2 class="mb-5" style="text-align:center;color:#092756;font-size:25px !important;"> Stok Maliyet<h2>

                    <a href="{{route('stokMaliyeti')}}" class="btn btn-success urunlerbtn1">Başka bir Ürün Maliyetine bakın</a>
                    <h5 class="total">Stok Maliyet Toplam Sayısı=<?php echo $_SESSION['stokMaliyet'] ?> TL.</h5>


        </div>
        <div class="container">

            <div class="table mt-5">
                <table class="table">
                    <thead>
                        <tr>

                            <th scope="col">Ürün Resmi</th>
                            <th scope="col">Ürün İsmi</th>
                            <th scope="col">Ürün Adedi</th>

                            <th scope="col">Firma Adi</th>
                            <th scope="col">Ürün Barkodu</th>
                            <th scope="col">SatinAlinmaTarihi</th>
                            <th scope="col">maliyet</th>

                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    @foreach($maliyet as $maliyett)
                    <tbody>
                        <tr>


                            <td><img src="{{asset('assets')}}/img/{{$maliyett->image}}" class="card-img mr-5 urunimg" alt="..."> </td>
                            <td style="font-size:20px;background-color:whitesmoke;">{{$maliyett->urunAdi}}</td>
                            <td style="font-size:20px;">{{$maliyett->urunAdet}}</td>

                            <td style="font-size:20px; ">{{$maliyett->firmaAdi}}</td>

                            <td style="background-color:#FFC107"><img src="{{$maliyett->urunBarkod}}" class="qr-code img-thumbnail img-responsive"></td>
                            <td style="font-size:20px;background-color:#28A745;">{{$maliyett->satinAlinmaTarihi}}</td>
                            <td style="font-size:20px; background-color:#DC3545;color:White;">{{$maliyett->maliyet}}TL</td>

                            <td> <a href="{{route('urunIncele')}}" class="btn btn-primary urunlerbtn">İNCELE</a></td>



                        </tr>

                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>




    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="{{asset('assets')}}/js/main.js"></script>
</body>

</html>
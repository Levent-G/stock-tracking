@section('title','Anasayfa')
<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body id="homepage">
    <div id="screen">
        <div class="loader"></div>
    </div>

    <div id="main">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">

            <h4 class="navbar-brand-bold">STOK TAKİBİ</h4>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link  " style="float:right; color:black;"><i class="fa-brands fa-facebook-f icon1" style="font-size:25px;color:#ffbf00; "></i></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link  " style="float:right; color:black;"><i class="fa-brands fa-twitter icon1" style="font-size:25px;color:#ffbf00; "></i></a>

                    </li>
                    <li class="nav-item active">
                        <a class="nav-link  " style="float:right; color:black;"><i class="fa-brands fa-instagram icon1" style="font-size:25px;color:#ffbf00; "></i></a>

                    </li>
                    <li class="nav-item active">
                        <a class="nav-link  " style="float:right; color:black;"><i class="fa-brands fa-linkedin-in icon1" style="font-size:25px;color:#ffbf00; "></i></a>

                    </li>
                    <li class="nav-item active">
                        <a class="nav-link  " style="float:right; color:black;"><i class="fa-brands fa-github icon1" style="font-size:25px;color:#ffbf00; "></i></a>

                    </li>
                </ul>

            </div>
        </nav>

        <div class="formalani ml-auto">

            <div class="container mt-4">
                <h4 style="text-align:center; color:#0019b7;">STOK TAKİBİ UYGULAMASINA <h4 style="text-align:center;color:#0019b7;"> HOŞ GELDİNİZ<h4>
                            <hr>
                        </h4>
                        <h1 style="margin-top:40px;"> GİRİS YAP
                            <hr>
                        </h1>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            {{$errors->first()}}
                        </div>
                        @endif

                        <form method="post" action="{{route('admin.login.post')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control loginform" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control loginform" id="exampleInputPassword1" name="password">
                            </div>

                            <button type="submit" class="btn btn-primary btn-login mt-5">Giris Yap</button>
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
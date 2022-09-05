<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <span style="font-size:30px;cursor:pointer;" onclick="openNav()" id="closeBtn">
        &#9776; </span>
    <div class="container">
        <h1 class="navbar-brand ml-5" href="#">STOK TAKİBİ</h1>
    </div>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <form class="form-inline my-2 my-lg-0">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active" style="border:1px solid black;">

                    <a class="nav-link " href="{{route('admin.logout')}}" style="font-size:17px;">
                        ÇIKIŞ:<i class="fas fa-sign-out-alt icon1" style="font-size:20px;color:#ffbf00; "></i>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link  " style="float:right; color:black;"><i class="fa-brands fa-facebook-f icon1" style="font-size:20px;color:#ffbf00; "></i></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link  " style="float:right; color:black;"><i class="fa-brands fa-twitter icon1" style="font-size:20px;color:#ffbf00; "></i></a>

                </li>
                <li class="nav-item active">
                    <a class="nav-link  " style="float:right; color:black;"><i class="fa-brands fa-instagram icon1" style="font-size:20px;color:#ffbf00; "></i></a>

                </li>
                <li class="nav-item active">
                    <a class="nav-link  " style="float:right; color:black;"><i class="fa-brands fa-linkedin-in icon1" style="font-size:20px;color:#ffbf00; "></i></a>

                </li>
                <li class="nav-item active">
                    <a class="nav-link  " style="float:right; color:black;"><i class="fa-brands fa-github icon1" style="font-size:20px;color:#ffbf00; "></i></a>

                </li>
            </ul>
        </form>
    </div>
</nav>
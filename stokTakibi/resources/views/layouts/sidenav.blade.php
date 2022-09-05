@session_start();
<div id="YanMenu" class="sidenav">
    <div class="card m-3 mt-5 p-3 menuCard">
        <a href="javascript:void(1)" class="closebtn " onclick="closeNav()" style="font-size:50px;margin:5px;" id="closeBtn">&times;</a>
        <h4 style="float:left; font-weight:bold;text-align:center;color:#092756; font-size:17; ">Hoşgeldiniz</h4>
        <p class="mt-4" style="text-transform: uppercase; font-weight:bold;float:left;text-align:center; font-size:15px; "><?php echo   $_SESSION['adı'] ?></p>
        <img src="{{asset('assets')}}/img/profile.png" alt="" class="profileimg my-2">
        <div class="card-body menucard">


            <p style="text-transform: uppercase; font-weight:bold;font-size:15px; "><?php echo $_SESSION['rutbesi'] ?>
            </p><br>






        </div>
    </div>
    <a class="amenu" href="{{route('UrunListesi')}}"><i class="fa-solid fa-clipboard-list sidenavicon"></i>UrunListesi</a>
    <a class="amenu" href="{{route('urunEkle')}}"><i class="fa-solid fa-cart-plus sidenavicon"></i>Ürün Ekle</a>
    <a class="amenu" href="{{route('stokDurum')}}"><i class="fa-solid fa-arrow-trend-down sidenavicon"></i>Stok Durum</a>
    <a class="amenu" href="{{route('faturaBilgi')}}"><i class="fa-solid fa-file-invoice sidenavicon"></i>Fatura Bilgileri</a>
    <a class="amenu" href="{{route('stokGecmisi')}}"><i class="fa-solid fa-rectangle-list sidenavicon"></i>Stok Geçmişi</a>
    <a class="amenu" href="{{route('stokMaliyeti')}}"><i class="fa-solid fa-clipboard-list sidenavicon"></i>Stok Maliyeti</a>

    <?php if (!($_SESSION['isLogin'])) { ?>
        <a class="amenu" href="{{route('homepage')}}">Giriş Yap</a>
    <?php } ?>
</div>
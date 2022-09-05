<?php

namespace App\Http\Controllers\Front;

session_start();

use App\Http\Controllers\Controller;

use App\Models\Models\UrunlerModel;

use Illuminate\Http\Request;
use App\Models\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\StokModel;


class UrunlerController extends Controller
{    //---------------------------------------URUNLER İLE İLGİLİ FONKSİYONLAR START -------------------------------------------------------------------------------//


    // ÜRÜNLERİ LİSTELENDİĞİ FONKSİYON ///
    public function urunlerlist()
    {

        $urunlerlist = UrunlerModel::all();
        $urunlerSayisi = DB::table('urunler')->count();
        $urunlerToplamSayisi = DB::table('urunler')->sum('urunAdet');
        $_SESSION['urunlerSayisi'] = $urunlerSayisi;
        $_SESSION['urunlerToplamSayisi'] = $urunlerToplamSayisi;
        $_SESSION['filtreT'] = false;
        $_SESSION['depoT'] = false;
        $_SESSION['yuklemeBasariliqr'] = false;
        $_SESSION['qrKontrol'] = false;
        $_SESSION['guncellemeBasarili'] = false;
        $_SESSION['guncellemeBasarili1'] = false;


        return view('UrunListesi', compact('urunlerlist'));
    }
    //STOK DURUMU KÖTÜ OLANLARIN LİSTELENDİĞİ FONKSİYON //
    public function filtre()
    {

        $_SESSION['filtreD'] = false;
        $_SESSION['filtreT'] = true;
        $stokkotuDurumSayısı = DB::table('urunler')
            ->where('urunAdet', '<=', 10)
            ->count();
        $_SESSION['stokkotuDurumSayısı'] = $stokkotuDurumSayısı;
        //stok filtreleme
        $filtre = DB::select('select*from urunler where urunAdet <= 10');

        return view('stokDurum', compact('filtre'));
    }
    //STOK YENİLE FUNCTİON START --------//
    public function stokYenile($urunSeriNo)
    {
        $urun = UrunlerModel::where('urunSeriNo', $urunSeriNo)->first();
        $_SESSION['guncellemeBasarili1'] = false;
        return (view('stokYenile', compact('urun')));
    }
    public function stokYenileFunction(Request $request, $urunSeriNo)
    {
        $yeniAdet = $request->urunAdet;
        $maliyet = $request->maliyet;
        $firmaAdi = $request->firmaAdi;
        $satinAlinmaTarihi = date('Y-m-d H:i:s');
        $urunBilgileri = UrunlerModel::where('urunSeriNo', $urunSeriNo)->first();
        $urunAdi = $urunBilgileri->urunAdi;
        $resimAdi = $urunBilgileri->image;
        $urunBarkod = $urunBilgileri->urunBarkod;

        DB::table('stok')->insert([
            'urunAdi' => $urunAdi,
            'image' => $resimAdi,
            'urunAdet' => $yeniAdet,
            'urunSeriNo' => $urunSeriNo,
            'urunBarkod' => $urunBarkod,
            'firmaAdi' => $firmaAdi,
            'satinAlinmaTarihi' => $satinAlinmaTarihi,
            'maliyet' => $maliyet,

        ]);
        DB::table('urunler')
            ->where('urunSeriNo', $urunSeriNo)
            ->update(array('urunAdet' => $yeniAdet));
        $urun = UrunlerModel::where('urunSeriNo', $urunSeriNo)->first();
        $_SESSION['guncellemeBasarili1'] = true;
        return (view('stokYenile', compact('urun')));
    }
    //STOK YENİLE FUNCTİON END ----- //
    //ÜRÜNÜN DETAYLI LİSTELENDİĞİ FONKSİYON //
    public function incele($seriNo)
    {
        $incele = UrunlerModel::where('urunSeriNo', $seriNo)->first();
        return view('UrunIncele', compact('incele'));
    }
    //ÜRÜNÜN EKLENDİĞİ FONKSİYON //
    public function urunEklemeIslemi(Request $request)
    {


        $resimAdi = $request->urunAdi . time() . "." . $request->image->getClientOriginalExtension();
        $yukle = $request->image->move(public_path('assets/img'), $resimAdi);



        $urunAdi = $request->urunAdi;
        $urunSeriNo = rand(1000000, 100000000);
        $urunAdet = $request->urunAdet;
        $depo = $request->depo;

        DB::table('urunler')->insert([
            'urunAdi' => $urunAdi,
            'image' => $resimAdi,
            'urunSeriNo' => $urunSeriNo,
            'urunAdet' => $urunAdet,
            'depo' => $depo,

        ]);
        $_SESSION['yuklemeBasarili'] = true;
        return view('urunEkle');
    }
    //QR BİLGİLERİNİN GELDİĞİ  FONKSİYON //
    public function qrEkle($seriNo)
    {

        $urunListesi = UrunlerModel::where('urunSeriNo', $seriNo)->first();
        return view('qrEkle', compact('urunListesi'));
        $_SESSION['yuklemeBasariliqr'] = false;
    }
    //QR EKLENDİĞİ FONKSİYON //
    public function qrBilgiler(Request $request)
    {
        $urunListesi = UrunlerModel::where('urunSeriNo', $request->urunSeriNo1)->first();
        $qrBilgiler = $request->qrBilgiler;
        $qrUzanti =  "https://chart.googleapis.com/chart?cht=qr&chl=" . $qrBilgiler . "&chs=160x160&chld=L|0";
        $_SESSION['qrUzanti'] = $qrUzanti;
        $_SESSION['yuklemeBasariliqr'] = true;

        DB::table('urunler')
            ->where('urunSeriNo', $request->urunSeriNo1)
            ->update(array('urunBarkod' => $qrUzanti));

        return view('qrEkle', compact('urunListesi'));
    }
    //QR OLUP OLMADIĞININ KONTROLUNUN YAPILDIĞI FONKSİYON //
    public function qrKontrol()
    {
        $barkodsuzUrunler = DB::table('urunler')
            ->where('urunBarkod', '=', null)
            ->count();

        $_SESSION['barkodsuzUrunler'] = $barkodsuzUrunler;
        $_SESSION['qrKontrol'] = true;
        $qrKontrol = UrunlerModel::where('urunBarkod', null)->get();
        return view('UrunListesi', compact('qrKontrol'));
    }
    //ÜRÜNÜN GÜNCELLEME İŞLEMLERİNİN YAPILDIĞI FONKSİYON //
    public function urunGuncellemeIslemeri(Request $request)
    {
        $incele = UrunlerModel::where('urunSeriNo',  $request->urunSeriNo)->first();
        if ($request->has('image')) {

            $resimAdi = $request->urunAdi . "." . $request->image->getClientOriginalExtension();
            $yukle = $request->image->move(public_path('assets/img'), $resimAdi);

            DB::table('urunler')
                ->where('urunSeriNo', $request->urunSeriNo)
                ->update(array('image' => $resimAdi));
        }
        if ($request->has('urunAdi')) {
            $urunAdi = $request->urunAdi;
            DB::table('urunler')
                ->where('urunSeriNo', $request->urunSeriNo)
                ->update(array('urunAdi' => $urunAdi));
        }
        if ($request->has('urunAdet')) {
            $urunAdet = $request->urunAdet;
            DB::table('urunler')
                ->where('urunSeriNo', $request->urunSeriNo)
                ->update(array('urunAdet' => $urunAdet));
        }
        if ($request->has('depo')) {
            $depo = $request->depo;
            DB::table('urunler')
                ->where('urunSeriNo', $request->urunSeriNo)
                ->update(array('depo' => $depo));
        } else {
            echo "veriler yüklenemedi";
            $_SESSION['guncellemeBasarili'] = false;
        }
        $_SESSION['guncellemeBasarili'] = true;
        return view('urunIncele', compact('incele'));
    }

    //FATURA BİLGİLERİ START //
    public function faturaBilgi()
    {
        $faturaSayisi = DB::table('stok')->count();
        $_SESSION['faturaSayisi'] = $faturaSayisi;

        return view('faturaBilgi');
    }
    public function faturaBilgiTable(Request $request)
    {
        $urunAdi = $request->urunAdi;
        $fatura = DB::table('stok')->where('urunAdi', $urunAdi)->get();
        return (view('faturaBilgileriTable', compact('fatura')));
    }
    // FATURA BİLGİLERİ END //
    //STOK GEÇMİŞİ START//
    public function stokGecmisi()
    {
        $stokIslemSayisi = DB::table('stok')->count();
        $_SESSION['stokIslemSayisi'] = $stokIslemSayisi;

        return view('stokGecmisi');
    }
    public function stokGecmisiTable(Request $request)
    {
        $urunAdi = $request->urunAdi;
        $stok = DB::table('stok')->where('urunAdi', $urunAdi)->get();
        return (view('stokGecmisiTable', compact('stok')));
    }
    //STOK GEÇMİŞİ END //
    //STOK MALİYET START//
    public function stokMaliyeti()
    {
        $stokIslemSayisi = DB::table('stok')->sum('maliyet');
        $_SESSION['stokMaliyet'] = $stokIslemSayisi;


        return view('stokMaliyeti');
    }
    public function stokMaliyetTable(Request $request)
    {
        $urunAdi = $request->urunAdi;
        $maliyet = DB::table('stok')->where('urunAdi', $urunAdi)->get();
        $stokIslemSayisi = DB::table('stok')->where('urunAdi', $urunAdi)->sum('maliyet');
        $_SESSION['stokMaliyet'] = $stokIslemSayisi;
        return (view('stokMaliyetTable', compact('maliyet')));
    }

    //STOK MALİYET END//

    //---------------------------------------URUNLER İLE İLGİLİ FONKSİYONLAR END -------------------------------------------------------------------------------//

}

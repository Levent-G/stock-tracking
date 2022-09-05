<?php

namespace App\Http\Controllers\Front;

session_start();

use App\Http\Controllers\Controller;

use App\Models\Models\UrunlerModel;

use Illuminate\Http\Request;
use App\Models\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class DepoController extends Controller
{    //---------------------------------------DEPOLAR İLE İLGİLİ FONKSİYONLAR START -------------------------------------------------------------------------------//



    //DEPOYA GÖRE STOK LİSTELEME //

    public function filtre1($depoName)
    {
        $_SESSION['filtreT'] = false;
        $_SESSION['filtreD'] = true;
        $_SESSION['qrKontrol'] = false;
        $depostoksayisi = DB::table('urunler')
            ->where('urunAdet', '<=', 10)
            ->where('depo', '=', $depoName)
            ->count();
        $_SESSION['depostoksayisi'] = $depostoksayisi;
        //stok filtreleme
        $filtre1 = DB::select('select*from urunler where urunAdet <= 10 and depo = "' . $depoName . '"');

        return view('stokDurum', compact('filtre1'));
    }

    //DEPOYA GÖRE LİSTELEME //
    public function depoUrunleri($depoName)
    {
        $_SESSION['depoT'] = true;
        $_SESSION['qrKontrol'] = false;
        $depoUrunSayisi = DB::table('urunler')
            ->where('depo', '=', $depoName)
            ->count();

        $_SESSION['depoUrunSayisi'] = $depoUrunSayisi;

        $depoName = UrunlerModel::whereDepo($depoName)->get();
        // depoya ürünleri ekleme

        return view('UrunListesi', compact('depoName'));
    }
    //---------------------------------------DEPOLAR İLE İLGİLİ FONKSİYONLAR END -------------------------------------------------------------------------------//

}

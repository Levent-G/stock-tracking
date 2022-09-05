<?php


namespace App\Http\Controllers\Front;

session_start();

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Models\UrunlerModel;

class HomepageController extends Controller
{
    public function index()
    {
        return view('homepage');
    }

    public function urunEkle()
    {
        $_SESSION['yuklemeBasarili'] = false;
        return view('urunEkle');
    }
}

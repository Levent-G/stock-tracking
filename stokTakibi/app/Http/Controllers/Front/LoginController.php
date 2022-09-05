<?php

namespace App\Http\Controllers\Front;

session_start();

use App\Http\Controllers\Controller;

use App\Models\Models\UrunlerModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller
{
    public function loginPost(Request $request)
    {
        $_SESSION['isLogin'] = false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // giris başarılı demek
            $name = DB::select('select*from admins where email =?', [$request->email]);
            foreach ($name as $name) {

                $_SESSION['rutbesi'] = $name->rutbe;
                $_SESSION['adı'] = $name->name;
            }
            $_SESSION['isLogin'] = true;
            return view('anasayfa');
        }
        return redirect()->route('homepage')->withErrors('email adresi veya sifre hatalı!!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('homepage');
    }
}

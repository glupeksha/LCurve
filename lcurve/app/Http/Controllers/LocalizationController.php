<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller {

   public function index(Request $request,$locale){
      //set’s application’s locale
      App::setLocale($locale);
      Session::put('locale',$locale);
      //dd(App::getLocale());

      return back();
   }
}

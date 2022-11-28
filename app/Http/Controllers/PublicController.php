<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\RequestRoleMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function homepage(){
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')
                    ->take(6)->get();
        return view('welcome', compact('articles'));
    }

    public function workWithUs(){
        return view('workWithUs');
    }

    public function sendRoleRequest(Request $request)
    {

   $user = Auth::user();
   $role = $request->input('role');
   $email = $request->input('email');
   $presentation = $request->input('presentation');
   $requestMail = new RequestRoleMail(compact('role', 'email', 'presentation'));
   Mail::to('admin@blog.it')->send($requestMail);
   switch ($role) {
    case 'admin':
        $user->is_admin = NULL;
        break;
    case 'revisor':
        $user->is_revisor = NULL;
        break;
    case 'writer':
            $user->is_writer = NULL;
            break;
   }
   $user->update();
   return redirect()->route('homepage')->with('message', 'Grazie per averci contattato');
} 

public function searchArticle(Request $request){
    $key = $request -> input('key');
    $articles = Article::search($key)->where('is_accepted', true)->get();
    return view('article.searched', compact('articles', 'key'));
}

}

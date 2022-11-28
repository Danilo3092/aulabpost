<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('article.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Auth::user()->articles()->create(
            [
                'title'=>$request->input('title'),
                'description'=>$request->input('description'),
                'body'=>$request->input('body'),
                'img'=>$request->file('img')->store("public/img"),
                'category_id'=>$request->input('category_id'),
            ]
        );
        $selectedTags = $request->input('tags');
        foreach ($selectedTags as $tagId){
            $article->tags()->attach($tagId);
        }
        
        return redirect()->route('homepage')->with("message", "Articolo inoltrato al revisore correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::all();
        return view('article.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        if($request->has('img')){
            $article->update(
                [
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'body' => $request->input('body'),
                    'img' => $request->file('img')->store("public/img"),
                    'category_id' => $request->input('category_id'),
                ]
                );
        }else{
            $article->update(
                [
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'body' => $request->input('body'),
                    'category_id' => $request->input('category_id'),
                ]
                );
        }
       
        $article->tags()->detach();
        $article->tags()->sync($request->input('tags'));
        $article->is_accepted = false;
        $article->save();

        return redirect()->route('article.dashboard');
        //->with("message", "Articolo inoltrato al revisore correttamente");

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.dashboard');
    }

    public function articlesForCategory(Category $category){
        $articles = Article::where('category_id', $category->id)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('category.category', compact('articles', 'category'));
    }

    public function articlesForUser(User $user){
        $articles = Article::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('user.user', compact('articles', 'user'));
}

    public function articleDashboard(){
        return view('article.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;

use function Laravel\Prompts\title;

class BlogController extends Controller
{
    public function readCategories()
    {
        $categories = Category::all();
        return view('blog.create', compact('categories'));
    }

    public function createArticle(ArticleRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::firstOrCreate(
            ['name' => $validatedData['category']]
        );
        $validatedData['category_id'] = $category->id;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            $validatedData['image'] = "image/" . $imageName;
        } else {
            $validatedData['image'] = null;
        }

        $validatedData['author_id'] = Auth::id();

        Article::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Article créé avec success');
    }

    public function dashboardArticles():View {
        $articles = Article::where('author_id', Auth::id())->get();
        return view('dashboard', ['articles' =>$articles]);
    }

        // Aller sur le lien de le modification de l'article

    public function dashboardArticlesSingle($id){
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('blog.update', compact('article', 'categories'));
    }
         // Modification de l'article
    public function update(Request $request, $id){

      $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,jpg,png,svg',
       ]);

       $article = Article::findOrFail($id);

       if ($request->hasFile('image')) {

        if ($article->image && file_exists(public_path($article->image))) {
            unlink(public_path($article->image));
        }

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('image'), $imageName);

        $validatedData['image'] = "image/" . $imageName;
       } else {
          $validatedData['image'] = $article->image;
        }

         $article->update($validatedData);

        return redirect()->route('dashboard')->with('update', 'Article modifié avec succès');
        
    } 

    // Suppemer l'article

    public function destroy($id) {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('dashboard')->with('delete', 'Article supprimé avec succès');
    }

    //  Afficher les article dans la page d'accueil

    public function index():View {
       $articles = Article::all();
        return view('blog.index', ['articles'=>$articles]);
    }

    //  Lien pour voir les donnée de l'article

    public function show($id):View {
        $article = Article::with('author')->findOrFail($id);
        return view('blog.show', ['article'=>$article]);
    }
}

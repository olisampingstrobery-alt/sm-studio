<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index(){ $articles=Article::with(['category','user'])->latest()->paginate(10); return view('admin.articles.index', compact('articles')); }
    public function create(){ $categories=Category::all(); return view('admin.articles.create', compact('categories')); }
    public function store(Request $request){
        $request->validate(['title'=>'required|string|max:255','category_id'=>'nullable|exists:categories,id','content'=>'required|string','excerpt'=>'nullable|string|max:500','featured_image'=>'nullable|image|mimes:jpeg,png,jpg,webp|max:4096','is_published'=>'nullable|boolean']);
        $data=$request->only(['title','category_id','content','excerpt','seo_title','meta_description']);
        $baseSlug = Str::slug($request->title); $slug=$baseSlug; $i=1; while(Article::where('slug',$slug)->exists()){ $slug=$baseSlug.'-'.$i++; }
        $data['slug']=$slug; $data['user_id']=auth()->id(); $data['is_published']=$request->boolean('is_published'); $data['published_at']=$data['is_published']?now():null;
        if($request->hasFile('featured_image')) $data['featured_image']=$request->file('featured_image')->store('articles','public');
        Article::create($data); return redirect()->route('admin.articles.index')->with('success','Artikel berhasil dibuat — tampil di /insights jika Published + cover berdampingan.');
    }
    public function show(Article $article){ return view('admin.articles.show', compact('article')); }
    public function edit(Article $article){ $categories=Category::all(); return view('admin.articles.edit', compact('article','categories')); }
    public function update(Request $request, Article $article){
        $request->validate(['title'=>'required|string|max:255','category_id'=>'nullable|exists:categories,id','content'=>'required|string','excerpt'=>'nullable|string|max:500','featured_image'=>'nullable|image|mimes:jpeg,png,jpg,webp|max:4096','is_published'=>'nullable|boolean']);
        $data=$request->only(['title','category_id','content','excerpt','seo_title','meta_description']);
        $baseSlug = Str::slug($request->title); $slug=$baseSlug; $i=1; while(Article::where('slug',$slug)->where('id','!=',$article->id)->exists()){ $slug=$baseSlug.'-'.$i++; }
        $data['slug']=$slug; $data['is_published']=$request->boolean('is_published'); $data['published_at']=$data['is_published']?now():($article->published_at);
        if($request->hasFile('featured_image')){ if($article->featured_image) Storage::disk('public')->delete($article->featured_image); $data['featured_image']=$request->file('featured_image')->store('articles','public');}
        $article->update($data); return redirect()->route('admin.articles.index')->with('success','Artikel berhasil diupdate — perubahan langsung di /insights.');
    }
    public function destroy(Article $article){ if($article->featured_image) Storage::disk('public')->delete($article->featured_image); $article->delete(); return redirect()->route('admin.articles.index')->with('success','Article deleted.'); }
}

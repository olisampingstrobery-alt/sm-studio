<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){ $categories=Category::latest()->paginate(10); return view('admin.categories.index', compact('categories')); }
    public function create(){ return view('admin.categories.create'); }
    public function store(Request $request){
        $request->validate(['name'=>'required|string|max:255','type'=>'required|in:service,portfolio,article,general']);
        $data=$request->only(['name','type']);
        $base=Str::slug($request->name); $slug=$base; $i=1; while(Category::where('slug',$slug)->exists()){ $slug=$base.'-'.$i++; }
        $data['slug']=$slug;
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success','Kategori berhasil dibuat — langsung bisa dipakai di Portfolio/Service/Article & tampil di website umum.');
    }
    public function edit(Category $category){ return view('admin.categories.edit', compact('category')); }
    public function update(Request $request, Category $category){
        $request->validate(['name'=>'required|string|max:255','type'=>'required|in:service,portfolio,article,general']);
        $data=$request->only(['name','type']);
        $base=Str::slug($request->name); $slug=$base; $i=1; while(Category::where('slug',$slug)->where('id','!=',$category->id)->exists()){ $slug=$base.'-'.$i++; }
        $data['slug']=$slug;
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success','Kategori berhasil diupdate — perubahan langsung terlihat di website umum.');
    }
    public function destroy(Category $category){ $category->delete(); return redirect()->route('admin.categories.index')->with('success','Category deleted.'); }
}

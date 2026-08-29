<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }
    public function create()
    {
        $categories = Category::where('type','service')->orWhere('type','services')->get();
        if($categories->isEmpty()) $categories = Category::all();
        return view('admin.services.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'category_id'=>'nullable|exists:categories,id',
            'description'=>'nullable|string',
            'icon'=>'nullable|string|max:255',
            'detail'=>'nullable|string',
            'is_active'=>'boolean',
        ]);
        $data = $request->only(['title','category_id','description','icon','detail']);
        $data['slug']=Str::slug($request->title);
        $data['is_active']=$request->boolean('is_active', true);
        $data['benefits']=$request->benefits ? array_filter(explode(',', $request->benefits)) : null;
        Service::create($data);
        return redirect()->route('admin.services.index')->with('success','Service created successfully.');
    }
    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }
    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('admin.services.edit', compact('service','categories'));
    }
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'category_id'=>'nullable|exists:categories,id',
            'description'=>'nullable|string',
            'icon'=>'nullable|string|max:255',
            'detail'=>'nullable|string',
        ]);
        $data = $request->only(['title','category_id','description','icon','detail']);
        $data['slug']=Str::slug($request->title);
        $data['is_active']=$request->boolean('is_active');
        $data['benefits']=$request->benefits ? array_filter(explode(',', $request->benefits)) : null;
        $service->update($data);
        return redirect()->route('admin.services.index')->with('success','Service updated successfully.');
    }
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success','Service deleted successfully.');
    }
    public function toggleStatus(Service $service)
    {
        $service->update(['is_active'=>!$service->is_active]);
        return back()->with('success','Status updated.');
    }
}

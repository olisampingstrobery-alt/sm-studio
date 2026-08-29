<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){ $faqs=Faq::orderBy('order')->paginate(10); return view('admin.faqs.index', compact('faqs')); }
    public function create(){ return view('admin.faqs.create'); }
    public function store(Request $request){ $request->validate(['question'=>'required|string','answer'=>'required|string','category'=>'nullable|string','order'=>'nullable|integer']); $data=$request->only(['question','answer','category','order']); $data['is_active']=$request->boolean('is_active',true); Faq::create($data); return redirect()->route('admin.faqs.index')->with('success','FAQ created.'); }
    public function show(Faq $faq){ return view('admin.faqs.show', compact('faq')); }
    public function edit(Faq $faq){ return view('admin.faqs.edit', compact('faq')); }
    public function update(Request $request, Faq $faq){ $request->validate(['question'=>'required|string','answer'=>'required|string']); $data=$request->only(['question','answer','category','order']); $data['is_active']=$request->boolean('is_active'); $faq->update($data); return redirect()->route('admin.faqs.index')->with('success','FAQ updated.'); }
    public function destroy(Faq $faq){ $faq->delete(); return redirect()->route('admin.faqs.index')->with('success','FAQ deleted.'); }
}

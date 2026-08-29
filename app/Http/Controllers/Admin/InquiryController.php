<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index(){ $inquiries=Inquiry::latest()->paginate(10); return view('admin.inquiries.index', compact('inquiries')); }
    public function show(Inquiry $inquiry){ return view('admin.inquiries.show', compact('inquiry')); }
    public function update(Request $request, Inquiry $inquiry){ $request->validate(['status'=>'required|in:pending,contacted,completed,rejected','notes'=>'nullable|string']); $inquiry->update($request->only(['status','notes'])); return back()->with('success','Inquiry updated.'); }
    public function destroy(Inquiry $inquiry){ $inquiry->delete(); return redirect()->route('admin.inquiries.index')->with('success','Inquiry deleted.'); }
}

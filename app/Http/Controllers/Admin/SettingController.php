<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::all()->groupBy('group');
        // Ensure expected groups always exist so Blade $settings['general'] / ['contact'] doesn't throw "Undefined array key"
        $settings->put('general', $settings->get('general', collect()));
        $settings->put('contact', $settings->get('contact', collect()));
        return view('admin.settings.index', compact('settings'));
    }
    public function update(Request $request){
        $contactKeys = ['contact_email','contact_whatsapp','contact_address'];
        foreach($request->except(['_token','_method']) as $key=>$value){
            $group = in_array($key, $contactKeys) ? 'contact' : 'general';
            Setting::set($key, $value, 'string', $group);
        }
        return back()->with('success','Settings updated.');
    }
}

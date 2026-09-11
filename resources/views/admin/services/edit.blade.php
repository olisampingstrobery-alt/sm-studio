@extends('layouts.admin')
@section('title','Edit Service')
@section('header','Edit Service')
@section('content')
<div class="max-w-3xl">
    <div class="bg-white rounded-2xl shadow-card border border-slate-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-100"><h3 class="font-semibold text-[#0B1D33]">Edit: {{ $service->title }}</h3></div>
        <form action="{{ route('admin.services.update', $service) }}" method="POST" class="p-6 space-y-5">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Judul *</label>
                    <input type="text" name="title" value="{{ old('title',$service->title) }}" required class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Kategori</label>
                    <select name="category_id" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20">
                        <option value="">Pilih kategori</option>
                        @foreach($categories as $cat)<option value="{{ $cat->id }}" @selected(old('category_id',$service->category_id)==$cat->id)>{{ $cat->name }}</option>@endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Icon</label>
                    <input type="text" name="icon" value="{{ old('icon',$service->icon) }}" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20">{{ old('description',$service->description) }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Detail</label>
                    <textarea name="detail" rows="5" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20">{{ old('detail',$service->detail) }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Benefits (koma)</label>
                    <input type="text" name="benefits" value="{{ old('benefits', is_array($service->benefits)? implode(',', $service->benefits): $service->benefits) }}" class="w-full rounded-xl border-slate-200 focus:border-[#0F2A4A] focus:ring-[#0F2A4A]/20">
                </div>
                <div class="flex items-center gap-3">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" @checked($service->is_active) class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:ring-4 peer-focus:ring-[#0F2A4A]/20 rounded-full peer peer-checked:after:translate-x-full after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-black"></div>
                    </label>
                    <span class="text-sm font-medium">Aktif</span>
                </div>
            </div>
            <div class="flex justify-end gap-3 pt-4 border-t">
                <a href="{{ route('admin.services.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-200 font-medium">Batal</a>
                <button type="submit" class="px-6 py-2.5 rounded-xl bg-black text-white font-semibold">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

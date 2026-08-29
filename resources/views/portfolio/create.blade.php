<!-- resources/views/admin/portfolio/create.blade.php -->
@extends('layouts.admin')

@section('title', 'Create Portfolio')

@section('header', 'Create New Portfolio')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                <input type="text" name="title" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Client -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Client</label>
                <select name="client_id" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                    <option value="">Select Client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500 mt-1">Or enter client name below</p>
            </div>
            
            <!-- Client Name (manual) -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Client Name (Manual)</label>
                <input type="text" name="client_name" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Enter client name">
            </div>
            
            <!-- Category -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                <select name="category_id" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <!-- Status -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>
            
            <!-- Featured -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Featured</label>
                <div class="flex items-center">
                    <input type="checkbox" name="is_featured" value="1" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <span class="ml-2 text-gray-600">Make this portfolio featured</span>
                </div>
            </div>
            
            <!-- Technology -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Technology (comma separated)</label>
                <input type="text" name="technology[]" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200" placeholder="Laravel, React, MySQL">
                <p class="text-sm text-gray-500 mt-1">Separate with commas</p>
            </div>
            
            <!-- Featured Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                <input type="file" name="featured_image" accept="image/*" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                <p class="text-sm text-gray-500 mt-1">Max 2MB (JPEG, PNG, WebP)</p>
                @error('featured_image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Gallery Images -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Gallery Images</label>
                <input type="file" name="gallery_images[]" accept="image/*" multiple class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200">
                <p class="text-sm text-gray-500 mt-1">You can select multiple images</p>
            </div>
        </div>
        
        <!-- Description -->
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"></textarea>
        </div>
        
        <!-- Challenge -->
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Challenge</label>
            <textarea name="challenge" rows="4" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"></textarea>
        </div>
        
        <!-- Solution -->
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Solution</label>
            <textarea name="solution" rows="4" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"></textarea>
        </div>
        
        <!-- Process -->
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Process</label>
            <textarea name="process" rows="4" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"></textarea>
        </div>
        
        <!-- Result -->
        <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Result</label>
            <textarea name="result" rows="4" class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200"></textarea>
        </div>
        
        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.portfolio.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Create Portfolio</button>
        </div>
    </form>
</div>
@endsection
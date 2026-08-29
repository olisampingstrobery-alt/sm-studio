<!-- resources/views/admin/portfolio/index.blade.php -->
@extends('layouts.admin')

@section('title', 'Portfolio')

@section('header', 'Portfolio Management')

@section('content')
<div class="bg-white rounded-lg shadow">
    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
        <h3 class="text-lg font-semibold">All Portfolio</h3>
        <a href="{{ route('admin.portfolio.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            + Add New Portfolio
        </a>
    </div>
    
    <div class="p-6">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600 border-b">
                        <th class="pb-3">#</th>
                        <th class="pb-3">Image</th>
                        <th class="pb-3">Title</th>
                        <th class="pb-3">Client</th>
                        <th class="pb-3">Category</th>
                        <th class="pb-3">Status</th>
                        <th class="pb-3">Featured</th>
                        <th class="pb-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($portfolios as $portfolio)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3">{{ $loop->iteration }}</td>
                        <td class="py-3">
                            @if($portfolio->featured_image)
                                <img src="{{ asset('storage/' . $portfolio->featured_image) }}" 
                                     alt="{{ $portfolio->title }}" 
                                     class="w-12 h-12 object-cover rounded">
                            @else
                                <div class="w-12 h-12 bg-gray-200 rounded flex items-center justify-center">
                                    <span class="text-gray-400 text-xs">No image</span>
                                </div>
                            @endif
                        </td>
                        <td class="py-3">{{ $portfolio->title }}</td>
                        <td class="py-3">{{ $portfolio->client_name ?? $portfolio->client?->name ?? '-' }}</td>
                        <td class="py-3">{{ $portfolio->category?->name ?? '-' }}</td>
                        <td class="py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-medium {{ $portfolio->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ ucfirst($portfolio->status) }}
                            </span>
                        </td>
                        <td class="py-3">
                            @if($portfolio->is_featured)
                                <span class="text-yellow-500">⭐</span>
                            @else
                                <span class="text-gray-300">☆</span>
                            @endif
                        </td>
                        <td class="py-3">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.portfolio.show', $portfolio) }}" class="text-blue-600 hover:text-blue-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="text-yellow-600 hover:text-yellow-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.portfolio.destroy', $portfolio) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="py-6 text-center text-gray-500">No portfolio found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $portfolios->links() }}
        </div>
    </div>
</div>
@endsection
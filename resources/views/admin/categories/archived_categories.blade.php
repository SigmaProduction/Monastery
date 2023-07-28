<!-- resources/views/categories/index.blade.php -->

@extends('layouts.admin') <!-- Assuming you have a layout file for the admin panel -->

@section('title', 'Categories')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Search Archived Categories</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.categories.archived_categories') }}" method="get">
                <div class="input-group mb-3">
                    <div class="container-fluit">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" name="search" class="form-control" placeholder="Search by name..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-4">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Archived Categories</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Menu name</th>
                    <th>Category name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->menu->name ?? '' }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;" onsubmit="return handleSubmit(this, 'Are you sure you want to delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No results found for the given filters.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $categories->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@stop

<!-- resources/views/categories/index.blade.php -->

@extends('layouts.admin') <!-- Assuming you have a layout file for the admin panel -->

@section('title', 'Categories')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Search Categories</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.index') }}" method="get">
                <div class="input-group mb-3">
                    <div class="container-fluit">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" name="search" class="form-control" placeholder="Search by name..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-5">
                                <!-- Dropdown for menu_id -->
                                <select name="menu_id" class="form-control">
                                    <option value="">Select Menu</option>
                                    @foreach($menus as $menu)
                                        <option value="{{ $menu->id }}" {{ (request('menu_id') == $menu->id) ? 'selected' : '' }}>
                                            {{ $menu->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
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
            <h3 class="card-title">Categories</h3>
            <div class="card-tools">
                <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create Category</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Menu</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $category->menu->name }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
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

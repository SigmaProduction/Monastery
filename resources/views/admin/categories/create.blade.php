<!-- resources/views/categories/create.blade.php -->

@extends('layouts.admin')

@section('title', 'Create Category')

@section('content_header')
    <h1>Create Category</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container-fluit">
                <div class="col-md-8">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="menu_id">Menu</label>
                            <select class="form-control" id="menu_id" name="menu_id">
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}" {{ old('menu_id') == $menu->id ? 'selected' : '' }}>
                                        {{ $menu->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('menu_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="meta_content">Meta Content</label>
                            <input type="text" class="form-control" id="meta_content" name="meta_content" value="{{ old('meta_content') }}" required>
                            @error('meta_content')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Create</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-default">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

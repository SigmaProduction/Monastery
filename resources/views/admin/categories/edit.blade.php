<!-- resources/views/categories/edit.blade.php -->

@extends('layouts.admin') <!-- Assuming you have a layout file for the admin panel -->

@section('title', 'Edit Category')

@section('content_header')
    <h1>Edit Category</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="menu_id">Menu</label>
                    <select name="menu_id" id="menu_id" class="form-control{{ $errors->has('menu_id') ? ' is-invalid' : '' }}">
                        <option value="" selected>Please select menu</option>
                        @foreach($menus as $menu)
                            <option value="{{ $menu->id }}" {{ old('menu_id', $category->menu_id) == $menu->id ? 'selected' : '' }}>{{ $menu->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('menu_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('menu_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name', $category->name) }}">
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="meta_content">Meta Content</label>
                    <input name="meta_content" id="meta_content" class="form-control{{ $errors->has('meta_content') ? ' is-invalid' : '' }}" value="{{ old('meta_content', $category->meta_content) }}"></input>
                    @if ($errors->has('meta_content'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('meta_content') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label id="is_important_label" for="is_important" class="form-group">Is Important
                        <input type="hidden" name="is_important" value="0"> <!-- Hidden field with default value -->
                        <input type="checkbox" id="is_important" name="is_important" value="1" {{ old('is_important', $category->is_important) ? 'checked' : '' }}>
                    </label>
                    @error('is_important')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <a href="{{ route('categories.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@stop

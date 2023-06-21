@extends('layouts.admin') <!-- Assuming you have a layout file for the admin panel -->

@section('title', 'Edit Menu')

@section('content_header')
    <h1>Edit Menu</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/admin/menus/' . $menu->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $menu->name) }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@stop

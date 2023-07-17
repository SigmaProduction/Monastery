@extends('layouts.admin') <!-- Assuming you have a layout file for the admin panel -->

@section('title', 'Create New Menu')

@section('content_header')
    <h1>Create New Menu</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ url('/admin/menus') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter menu name" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('admin.menus.index') }}" class="btn btn-default">Back</a>
                </div>
            </form>
        </div>
    </div>
@stop

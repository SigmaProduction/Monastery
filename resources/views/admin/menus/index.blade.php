@extends('layouts.admin') <!-- Assuming you have a layout file for the admin panel -->

@section('title', 'Menu List')

@section('content_header')
    <h1>Menu List</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Menus</h3>
            <div class="card-tools">
                <a href="{{ url('/admin/menus/create') }}" class="btn btn-primary">Create Menu</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                        <tr>
                            <td>{{ $menu->id }}</td>
                            <td>{{ $menu->name }}</td>
                            <td>
                                <a href="{{ url('/admin/menus/' . $menu->id . '/edit') }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ url('/admin/menus/' . $menu->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this menu?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $menus->links() }}
        </div>
    </div>
@stop

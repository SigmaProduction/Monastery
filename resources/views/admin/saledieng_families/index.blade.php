@extends('layouts.admin') <!-- Assuming you have a layout file for the admin panel -->

@section('title', 'Saledieng families')

@section('content_header')
    <h1>Saledieng Families</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Saledieng Families</h3>
            <div class="card-tools">
                <a href="{{ route('admin.saledieng_families.create') }}" class="btn btn-primary">Create New</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.saledieng_families.index') }}" method="GET">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="name" name="name" value="{{ request()->input('name') }}" placeholder="Enter name">
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" id="saledieng_month_id" name="saledieng_month_id">
                            <option value="">Select a Saledieng Month</option>
                            @foreach ($saledieng_months as $saledieng_month)
                                <option value="{{ $saledieng_month->id }}" {{ request()->input('saledieng_month_id') == $saledieng_month->id ? 'selected' : '' }}>
                                    {{ $saledieng_month->month }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="{{ route('admin.saledieng_families.index') }}" class="btn btn-default">Reset Search Input</a>
                    </div>
                </div>
            </form>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Saledieng month</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Date of Birth</th>
                        <th>Date of Death</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($saledieng_families as $saledieng_family)
                        <tr data-menu-id="{{ $saledieng_family->id }}">
                            <td>
                                {{ $saledieng_family->saledieng_month ? $saledieng_family->saledieng_month->month : '' }}
                            </td>
                            <td>
                                {{ $saledieng_family->subname }}
                            </td>
                            <td>
                                {{ $saledieng_family->name }}
                            </td>
                            <td>
                                @if($saledieng_family->image)
                                    <img src="/{{ $saledieng_family->image }}"  style="width: 50px; height: 50px;"> <!-- Display Image -->
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                {{ $saledieng_family->birth_date }}
                            </td>
                            <td>
                                {{ $saledieng_family->death_date }}
                            </td>
                            <td>
                                <a href="{{ url('/admin/saledieng_families/' . $saledieng_family->id . '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.saledieng_families.destroy', $saledieng_family) }}" method="POST" style="display: inline-block;" onsubmit="return handleSubmit(this, 'Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">No results found for the given filters.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <br>
            {{ $saledieng_families->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@stop

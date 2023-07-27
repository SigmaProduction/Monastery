@extends('layouts.admin')

@section('title', 'Saledieng Month')

@section('content_header')
    <h1>Saledieng Month</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Saledieng Month</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/saledieng_months/' . $saledieng_month->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="month">Month</label>
                    <input readonly type="text" name="month" id="month" class="form-control @error('month') is-invalid @enderror" value="{{ old('month', $saledieng_month->month) }}">
                    @error('month')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" name="content" id="content" class="form-control @error('content') is-invalid @enderror" value="{{ old('content', $saledieng_month->content) }}">
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <a href="{{ route('admin.saledieng_months.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@stop

@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Saledieng Family</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.saledieng_families.store') }}" method="POST" enctype="multipart/form-data" >
                @csrf

                <div class="form-group">
                    <label for="saledieng_month_id">Saledieng Month</label>
                    <select class="form-control" id="saledieng_month_id" name="saledieng_month_id">
                        <option value="">Select a Saledieng Month</option>
                        @foreach ($saledieng_months as $saledieng_month)
                            <option value="{{ $saledieng_month->id }}" {{ old('saledieng_month_id') == $saledieng_month->id ? 'selected' : '' }}>
                                {{ $saledieng_month->month }}
                            </option>
                        @endforeach
                    </select>
                    @error('saledieng_month_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="name" id="title_label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="birth_date" id="title_label">Date of birth</label>
                    <input type="text" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
                    @error('birth_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="death_date" id="title_label">Date of death</label>
                    <input type="text" class="form-control" id="death_date" name="death_date" value="{{ old('death_date') }}">
                    @error('death_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image" id="image_label">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" id="title_label">Description</label>
                    <textarea class="form-control" id="description" name="description" >{{ old('description') ? old('description') : ''}}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <a href="{{ route('admin.saledieng_families.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection

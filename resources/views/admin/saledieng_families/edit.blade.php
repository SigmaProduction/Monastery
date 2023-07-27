@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Saledieng Family</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.saledieng_families.update', $salediengFamily->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="saledieng_month_id">Saledieng Month</label>
                    <select class="form-control @error('saledieng_month_id') is-invalid @enderror" id="saledieng_month_id" name="saledieng_month_id">
                        <option value="">Select a Saledieng Month</option>
                        @foreach ($saledieng_months as $saledieng_month)
                            <option value="{{ $saledieng_month->id }}" {{ old('saledieng_month_id', $salediengFamily->saledieng_month_id) == $saledieng_month->id ? 'selected' : '' }}>
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
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $salediengFamily->name) }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="birth_date" id="title_label">Date of Birth</label>
                    <input type="text" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" name="birth_date" value="{{ old('birth_date', $salediengFamily->birth_date) }}">
                    @error('birth_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="death_date" id="title_label">Date of Death</label>
                    <input type="text" class="form-control @error('death_date') is-invalid @enderror" id="death_date" name="death_date" value="{{ old('death_date', $salediengFamily->death_date) }}">
                    @error('death_date')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image" id="image_label">Image</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    @if ($salediengFamily->image)
                        <p>Previously uploaded image:</p>
                        <img src="{{ asset($salediengFamily->image) }}" alt="Previously uploaded image" style="width: 150px; height: 150px;">
                    @endif
                </div>

                <div class="form-group">
                    <label for="description" id="title_label">Description</label>
                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $salediengFamily->description) }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <a href="{{ route('admin.saledieng_families.index') }}" class="btn btn-default">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

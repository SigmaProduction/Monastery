@extends('layouts.admin')

@section('title', 'Monetary information')

@section('content_header')
    <h1>Monetary Information</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Monetary Information</h3>
        </div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{ route('admin.monetary_information.update') }}" method="POST">
                            @csrf
                            @method('POST')

                            <div class="form-group">
                                <label for="bank_account_name">Bank account name</label>
                                <input type="text" class="form-control @error('bank_account_name') is-invalid @enderror" id="bank_account_name" name="bank_account_name" value="{{ old('bank_account_name', $monetary_info->bank_account_name) }}">
                                @error('bank_account_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="bank_account_number">Bank account number</label>
                                <input type="number" class="form-control @error('bank_account_number') is-invalid @enderror" id="bank_account_number" name="bank_account_number" value="{{ old('bank_account_number', $monetary_info->bank_account_number) }}">
                                @error('bank_account_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="bank_name">Bank name</label>
                                <input type="text" class="form-control @error('bank_name') is-invalid @enderror" id="bank_name" name="bank_name" value="{{ old('bank_name', $monetary_info->bank_name) }}">
                                @error('bank_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="bank_branch_name">Bank Branch name</label>
                                <input type="text" class="form-control @error('bank_branch_name') is-invalid @enderror" id="bank_branch_name" name="bank_branch_name" value="{{ old('bank_branch_name', $monetary_info->bank_branch_name) }}">
                                @error('bank_branch_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
@stop

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
            <div class="container-fluit">
                <div class="row">
                    <div class="col-md-8">
                        <form action="{{ route('admin.monetary_information.update') }}" method="POST">
                            @csrf
                            @method('POSt')

                            <div class="form-group">
                                <label for="bank_account_name">Bank account name</label>
                                <input type="text" class="form-control" id="bank_account_name" name="bank_account_name" value="{{ $monetary_info->bank_account_name }}">
                            </div>


                            <div class="form-group">
                                <label for="title">Bank account number</label>
                                <input type="text" class="form-control" id="bank_account_number" name="bank_account_number" value="{{ $monetary_info->bank_account_number }}">
                            </div>

                            <div class="form-group">
                                <label for="bank_name">Bank name</label>
                                <input type="text" class="form-control" id="describank_nameption" name="bank_name" value="{{ $monetary_info->bank_name }}">
                            </div>

                            <div class="form-group">
                                <label for="content">Bank Branch name</label>
                                <input type="text" class="form-control" id="bank_branch_name" name="bank_branch_name" value="{{ $monetary_info->bank_branch_name }}">
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

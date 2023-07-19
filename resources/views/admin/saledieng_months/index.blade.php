@extends('layouts.admin') <!-- Assuming you have a layout file for the admin panel -->

@section('title', 'Saledieng months')

@section('content_header')
    <h1>Saledieng Month List</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Saledieng Month</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($saledieng_months as $saledieng_month)
                        <tr data-menu-id="{{ $saledieng_month->id }}">
                            <td>
                                {{ $saledieng_month->month }}
                            </td>
                            <td>
                                {{ $saledieng_month->content }}
                            </td>
                            <td>
                                <a href="{{ url('/admin/saledieng_months/' . $saledieng_month->id . '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

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
            <table class="table table-bordered sortable table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                        <tr data-menu-id="{{ $menu->id }}">
                            <td style="width: 2px;">
                                <span class="handle ui-sortable-handle">
                                    <i class="fas fa-ellipsis-v"></i>
                                </span>
                            </td>
                            <td>
                                {{ $menu->name }}
                            </td>
                            <td>
                                <a href="{{ url('/admin/menus/' . $menu->id . '/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ url('/admin/menus/' . $menu->id) }}" method="POST" style="display: inline;" onsubmit="return handleSubmit(this, 'Are you sure you want to delete this menu?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $(".sortable tbody").sortable({
                helper: fixHelperModified,
                stop: updateOrder
            }).disableSelection();

            function fixHelperModified(e, tr) {
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function(index) {
                    $(this).width($originals.eq(index).width());
                });
                return $helper;
            }

            function updateOrder() {
                var menuOrder = [];
                $(".sortable tbody tr").each(function(index) {
                    menuOrder.push($(this).data('menu-id'));
                });

                $.ajax({
                    url: '{{ route("menu.updateOrder") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        menu: menuOrder
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
    </script>
@stop

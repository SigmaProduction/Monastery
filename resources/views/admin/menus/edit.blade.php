@extends('layouts.admin')

@section('title', 'Edit Menu')

@section('content_header')
    <h1>Edit Menu</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Menu</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('/admin/menus/' . $menu->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $menu->name) }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Categories</label>
                    <div class="d-flex justify-content-end">
                        <a href="{{ url('/admin/categories?menu_id=' . $menu->id) }}" class="btn btn-secondary mb-2">View Categories</a>
                    </div>
                    <table id="sortable" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr data-id="{{ $category->id }}">
                                    <td>{{ $category->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <input type="hidden" name="category_order" id="categoryOrderInput">
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    $(function() {
        $("#sortable tbody").sortable({
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

        function updateOrder(e, ui) {
            // Get the new order of categories
            var categoryOrder = [];
            $("#sortable tbody tr").each(function() {
                categoryOrder.push($(this).data("id"));
            });

            // Update the hidden input field with the new order
            $("#categoryOrderInput").val(JSON.stringify(categoryOrder));
        }
    });
</script>
@stop

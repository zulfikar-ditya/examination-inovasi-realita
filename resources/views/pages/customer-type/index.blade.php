@extends('layouts.app')

@php
    $title = 'customer type';

    $data_tables = ['name']
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        <x-btn-link :link="route('customer-type.create')" :color="'success'" :value="'Create'"/>

        <table class="table table-responsive data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </x-main-card>
@endsection

@section('js')
<script type="text/javascript">
    $(function () {
        
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('customer-type.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        
    });
</script>
@endsection
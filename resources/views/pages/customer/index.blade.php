@extends('layouts.app')

@php
    $title = 'customer';

    $data_tables = ['name']
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        <x-btn-link :link="route('customer.create')" :color="'success'" :value="'Create'"/>

        <table class="table table-responsive data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Customer Type</th>
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
            ajax: "{{ route('customer.index') }}",
            columns: [
                {data: 'id', name: 'id'},
                {data: 'nama', name: 'nama'},
                {data: 'alamat', name: 'alamat'},
                {data: 'tanggal_lahir', name: 'tanggal_lahir'},
                {data: 'longitude', name: 'longitude'},
                {data: 'latitude', name: 'latitude'},
                {data: 'customer_type', name: 'customer_type'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
        
    });
</script>
@endsection
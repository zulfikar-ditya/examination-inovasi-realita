@extends('layouts.app')

@php
    $title = 'Edit customer type';
@endphp

@section('title', Str::title($title))

@section('content')
    <x-main-card :title="$title">
        @include('pages.customer-type.__fields')
    </x-main-card>
@endsection
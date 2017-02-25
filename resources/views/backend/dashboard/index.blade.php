@extends('layouts.dashboard')

@section('sidebar')

    @include('backend.dashboard.components.sidebar')

@endsection

@section('content')

    <h1 class="page-header">Overview</h1>
    @include('backend.dashboard.components.labels')

@endsection
@extends('layouts.dashboard')

@section('sidebar')

    @include('backend.user.components.sidebar')

@endsection

@section('content')

    @include('backend.user.components.createForm')

@endsection
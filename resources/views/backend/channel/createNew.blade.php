@extends('layouts.dashboard')

@section('sidebar')

    @include('backend.channel.components.sidebar')

@endsection

@section('content')

    @include('backend.channel.components.createForm')

@endsection
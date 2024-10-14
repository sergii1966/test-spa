@extends('backend.layouts.backend-layout')
@include('backend.common.flash-messages')
@include('backend.common.navbar')

@section('content')
    @yield('navbar')
    @yield('flash-messages')
@endsection

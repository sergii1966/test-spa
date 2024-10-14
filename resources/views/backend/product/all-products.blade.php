@extends('backend.layouts.backend-layout')
@include('backend.common.flash-messages')
@include('backend.common.navbar')
@include('backend.product.all-products.button-add-product')
@include('backend.product.all-products.list-products')

@section('content')
    @yield('navbar')
    @yield('flash-messages')
    @yield('button-add-product')
    @yield('list-products')
@endsection

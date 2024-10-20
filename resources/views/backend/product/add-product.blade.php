@extends('backend.layouts.backend-layout')
@include('backend.common.flash-messages')
@include('backend.common.navbar')
@include('backend.product.add-product.form-status')
@include('backend.product.add-product.form-name-description')
@include('backend.product.add-product.form-prices')
@include('backend.product.add-product.form-add-image')
@include('backend.product.add-product.edit-image-product')

@section('content')
    @yield('navbar')
    @yield('flash-messages')
    @yield('form-status')
    @yield('form-name-description')
    @yield('form-prices')
    @yield('form-add-image')
    @yield('edit-image-product')
@endsection

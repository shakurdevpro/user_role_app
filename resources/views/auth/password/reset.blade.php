@extends('layouts.auth')
@section('title', 'New Password?')
@section('styles')
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
@endsection
@section('content')
    <!--begin::Authentication - New password -->
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        @include('sections.logo')
        <!--begin::Aside-->
        <div class="d-flex flex-column flex-column-fluid flex-center w-lg-50 p-10">
            <!--begin::Wrapper-->
            <div class="d-flex justify-content-between flex-column-fluid flex-column w-100 mw-450px">
                @include('patials.auth-header')
                @include('patials.auth-body')
                @include('patials.auth-footer')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Aside-->
        @include('sections.aside')
    </div>
    <!--end::Authentication - New password-->
@endsection
@section('scripts')
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('js/custom/authentication/reset-password/new-password.js') }}"></script>
    <script src="{{ asset('js/custom/authentication/sign-in/i18n.js') }}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
@endsection

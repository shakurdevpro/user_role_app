@if (Route::currentRouteName() == 'register')
    <!--begin::Header-->
    <div class="d-flex flex-stack py-2">
        <!--begin::Back link-->
        <div class="me-2">
            <a href="{{ route('login') }}" class="btn btn-icon bg-light rounded-circle">
                <i class="ki-duotone ki-black-left fs-2 text-gray-800"></i>
            </a>
        </div>
        <!--end::Back link-->
        <!--begin::Sign Up link-->
        <div class="m-0">
            <span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="sign-up-head-desc">Already
                a member ?</span>
            <a href="{{ route('login') }}" class="link-primary fw-bold fs-5" data-kt-translate="sign-up-head-link">Sign
                In</a>
        </div>
        <!--end::Sign Up link=-->
    </div>
    <!--end::Header-->
@endif
@if (Route::currentRouteName() == 'login')
    <!--begin::Header-->
    <div class="d-flex flex-stack py-2">
        <!--begin::Back link-->
        <div class="me-2"></div>
        <!--end::Back link-->
        <!--begin::Sign Up link-->
        <div class="m-0">
            <span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="sign-in-head-desc">Not a
                Member yet?</span>
            <a href="{{ route('register') }}" class="link-primary fw-bold fs-5"
                data-kt-translate="sign-in-head-link">Sign Up</a>
        </div>
        <!--end::Sign Up link=-->
    </div>
    <!--end::Header-->
@endif
@if (Route::currentRouteName() == 'password.request')
    <!--begin::Header-->
    <div class="d-flex flex-stack py-2">
        <!--begin::Back link-->
        <div class="me-2">
            <a href="{{ route('login') }}" class="btn btn-icon bg-light rounded-circle">
                <i class="ki-duotone ki-black-left fs-2 text-gray-800"></i>
            </a>
        </div>
        <!--end::Back link-->
        <!--begin::Sign Up link-->
        <div class="m-0">
            <span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="password-reset-head-desc">Already a
                member ?</span>
            <a href="{{ route('login') }}" class="link-primary fw-bold fs-5"
                data-kt-translate="password-reset-head-link">Sign In</a>
        </div>
        <!--end::Sign Up link=-->
    </div>
    <!--end::Header-->
@endif
@if (Route::currentRouteName() == 'password.reset')
    <!--begin::Header-->
    <div class="d-flex flex-stack py-2">
        <!--begin::Back link-->
        <div class="me-2">
            <a href="{{ route('login') }}" class="btn btn-icon bg-light rounded-circle">
                <i class="ki-duotone ki-black-left fs-2 text-gray-800"></i>
            </a>
        </div>
        <!--end::Back link-->
        <!--begin::Sign Up link-->
        <div class="m-0">
            <span class="text-gray-400 fw-bold fs-5 me-2" data-kt-translate="new-password-head-desc">Already a
                member ?</span>
            <a href="{{ route('login') }}" class="link-primary fw-bold fs-5"
                data-kt-translate="new-password-head-link">Sign In</a>
        </div>
        <!--end::Sign Up link=-->
    </div>
    <!--end::Header-->
@endif

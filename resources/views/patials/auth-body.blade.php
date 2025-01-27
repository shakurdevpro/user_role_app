@if (Route::currentRouteName() == 'register')
    <!--begin::Body-->
    <div class="py-20">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="/login"
            action="{{ route('register') }}" method="POST">
            @csrf
            <!--begin::Heading-->
            <div class="text-start mb-10">
                <!--begin::Title-->
                <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-up-title">Create an Account
                </h1>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">Get
                    unlimited access & earn money</div>
                <!--end::Link-->
            </div>
            <!--end::Heading-->
            <!--begin::Input group-->
            <div class="row fv-row mb-7">
                <!--begin::Col-->
                <div class="col-xl-6">
                    <input class="form-control form-control-lg form-control-solid" type="text"
                        placeholder="First Name" name="first_name" autocomplete="off"
                        data-kt-translate="sign-up-input-first-name" />
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-6">
                    <input class="form-control form-control-lg form-control-solid" type="text"
                        placeholder="Last Name" name="last_name" autocomplete="off"
                        data-kt-translate="sign-up-input-last-name" />
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-10">
                <input class="form-control form-control-lg form-control-solid" type="email" placeholder="Email"
                    name="email" autocomplete="off" data-kt-translate="sign-up-input-email" />
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-10" data-kt-password-meter="true">
                <!--begin::Wrapper-->
                <div class="mb-1">
                    <!--begin::Input wrapper-->
                    <div class="position-relative mb-3">
                        <input class="form-control form-control-lg form-control-solid" type="password"
                            placeholder="Password" name="password" autocomplete="off"
                            data-kt-translate="sign-up-input-password" />
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                            data-kt-password-meter-control="visibility">
                            <i class="ki-duotone ki-eye-slash fs-2"></i>
                            <i class="ki-duotone ki-eye fs-2 d-none"></i>
                        </span>
                    </div>
                    <!--end::Input wrapper-->
                    <!--begin::Meter-->
                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                        </div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                        </div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                        </div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                    </div>
                    <!--end::Meter-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Hint-->
                <div class="text-muted" data-kt-translate="sign-up-hint">Use 8 or more characters with a
                    mix of letters, numbers & symbols.</div>
                <!--end::Hint-->
            </div>
            <!--end::Input group=-->
            <!--begin::Input group-->
            <div class="fv-row mb-10">
                <input class="form-control form-control-lg form-control-solid" type="password"
                    placeholder="Confirm Password" name="password_confirmation" autocomplete="off"
                    data-kt-translate="sign-up-input-confirm-password" />
            </div>
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="d-flex flex-stack">
                <!--begin::Submit-->
                <button id="kt_sign_up_submit" class="btn btn-primary" data-kt-translate="sign-up-submit">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">Submit</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator progress-->
                </button>
                <!--end::Submit-->
                <!--begin::Social-->
                <div class="d-flex align-items-center">
                    <div class="text-gray-400 fw-semibold fs-6 me-6">Or</div>
                    <!--begin::Symbol-->
                    <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
                        <img alt="Logo" src="{{ asset('media/svg/brand-logos/google-icon.svg') }}" class="p-4" />
                    </a>
                    <!--end::Symbol-->
                    <!--begin::Symbol-->
                    <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
                        <img alt="Logo" src="{{ asset('media/svg/brand-logos/facebook-3.svg') }}" class="p-4" />
                    </a>
                    <!--end::Symbol-->
                    <!--begin::Symbol-->
                    <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light">
                        <img alt="Logo" src="{{ asset('media/svg/brand-logos/apple-black.svg') }}"
                            class="theme-light-show p-4" />
                        <img alt="Logo" src="{{ asset('media/svg/brand-logos/apple-black-dark.svg') }}"
                            class="theme-dark-show p-4" />
                    </a>
                    <!--end::Symbol-->
                </div>
                <!--end::Social-->
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Body-->
@endif
@if (Route::currentRouteName() == 'login')
    <!--begin::Body-->
    <div class="py-20">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}"
            method="POST">
            @csrf
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Heading-->
                <div class="text-start mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3 fs-3x" data-kt-translate="sign-in-title">Sign In</h1>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="general-desc">Get
                        unlimited access & earn money</div>
                    <!--end::Link-->
                </div>
                <!--begin::Heading-->
                <!--begin::Input group=-->
                <div class="fv-row mb-8">
                    <!--begin::Email-->
                    <input type="email" placeholder="Email" name="email" autocomplete="off"
                        data-kt-translate="sign-in-input-email" class="form-control form-control-solid" />
                    <!--end::Email-->
                </div>
                <!--end::Input group=-->
                <div class="fv-row mb-7">
                    <!--begin::Password-->
                    <input type="password" placeholder="Password" name="password" autocomplete="off"
                        data-kt-translate="sign-in-input-password" class="form-control form-control-solid" />
                    <!--end::Password-->
                </div>
                <!--end::Input group=-->
                <!--begin::Wrapper-->
                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-10">
                    <div></div>
                    <!--begin::Link-->
                    <a href="{{ route('password.request') }}" class="link-primary"
                        data-kt-translate="sign-in-forgot-password">Forgot Password
                        ?</a>
                    <!--end::Link-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Actions-->
                <div class="d-flex flex-stack">
                    <!--begin::Submit-->
                    <button id="kt_sign_in_submit" type="submit" class="btn btn-primary me-2 flex-shrink-0">
                        <!--begin::Indicator label-->
                        <span class="indicator-label" data-kt-translate="sign-in-submit">Sign In</span>
                        <!--end::Indicator label-->
                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">
                            <span data-kt-translate="general-progress">Please wait...</span>
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        <!--end::Indicator progress-->
                    </button>
                    <!--end::Submit-->
                    <!--begin::Social-->
                    <div class="d-flex align-items-center">
                        <div class="text-gray-400 fw-semibold fs-6 me-3 me-md-6" data-kt-translate="general-or">
                            Or</div>
                        <!--begin::Symbol-->
                        <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
                            <img alt="Logo" src="{{ asset('media/svg/brand-logos/google-icon.svg') }}"
                                class="p-4" />
                        </a>
                        <!--end::Symbol-->
                        <!--begin::Symbol-->
                        <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
                            <img alt="Logo" src="{{ asset('media/svg/brand-logos/facebook-3.svg') }}"
                                class="p-4" />
                        </a>
                        <!--end::Symbol-->
                        <!--begin::Symbol-->
                        <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light">
                            <img alt="Logo" src="{{ asset('media/svg/brand-logos/apple-black.svg') }}"
                                class="theme-light-show p-4" />
                            <img alt="Logo" src="{{ asset('media/svg/brand-logos/apple-black-dark.svg') }}"
                                class="theme-dark-show p-4" />
                        </a>
                        <!--end::Symbol-->
                    </div>
                    <!--end::Social-->
                </div>
                <!--end::Actions-->
            </div>
            <!--begin::Body-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Body-->
@endif
@if (Route::currentRouteName() == 'password.request')
    <!--begin::Body-->
    <div class="py-20">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" data-kt-redirect-url="/login"
            action="{{ route('password.email') }}" method="POST">
            @csrf
            <!--begin::Heading-->
            <div class="text-start mb-10">
                <!--begin::Title-->
                <h1 class="text-dark mb-3 fs-3x" data-kt-translate="password-reset-title">Forgot Password ?</h1>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="password-reset-desc">Enter your
                    email to reset your password.</div>
                <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group-->
            <div class="fv-row mb-10">
                <input class="form-control form-control-solid" type="email" placeholder="Email" name="email"
                    id="email" autocomplete="off" data-kt-translate="password-reset-input-email" />
            </div>
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="d-flex flex-stack">
                <!--begin::Link-->
                <div class="m-0">
                    <button id="kt_password_reset_submit" type="submit" class="btn btn-primary me-2"
                        data-kt-translate="password-reset-submit">
                        <!--begin::Indicator label-->
                        <span class="indicator-label">Submit</span>
                        <!--end::Indicator label-->
                        <!--begin::Indicator progress-->
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        <!--end::Indicator progress-->
                    </button>
                    <a href="{{ route('login') }}" class="btn btn-lg btn-light-primary fw-bold"
                        data-kt-translate="password-reset-cancel">Cancel</a>
                </div>
                <!--end::Link-->
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Body-->
@endif
@if (Route::currentRouteName() == 'password.reset')
    <!--begin::Body-->
    <div class="py-20">
        <!--begin::Form-->
        <form class="form w-100" novalidate="novalidate" id="kt_new_password_form" data-kt-redirect-url="/login"
            method="POST" action="{{ route('password.update') }}">
            @csrf
            <!--begin::Heading-->
            <div class="text-start mb-10">
                <!--begin::Title-->
                <h1 class="text-dark mb-3 fs-3x" data-kt-translate="new-password-title">Setup New Password</h1>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="text-gray-400 fw-semibold fs-6" data-kt-translate="new-password-desc">Have you
                    already reset the password ?</div>
                <!--end::Link-->
            </div>
            <!--end::Heading-->
            <!--begin::Input group-->
            <input type="hidden" name="token" value="{{ $token }}">
            <!--end::Input group-->
            <!--begin::Input group-->
            <input type="hidden" id="email" name="email" value="{{ request('email') }}">
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="mb-10 fv-row" data-kt-password-meter="true">
                <!--begin::Wrapper-->
                <div class="mb-1">
                    <!--begin::Input wrapper-->
                    <div class="position-relative mb-3">
                        <input class="form-control form-control-lg form-control-solid" type="password"
                            placeholder="Password" id="password" name="password" autocomplete="off"
                            data-kt-translate="new-password-input-password" />
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                            data-kt-password-meter-control="visibility">
                            <i class="ki-duotone ki-eye-slash fs-2"></i>
                            <i class="ki-duotone ki-eye fs-2 d-none"></i>
                        </span>
                    </div>
                    <!--end::Input wrapper-->
                    <!--begin::Meter-->
                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                    </div>
                    <!--end::Meter-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Hint-->
                <div class="text-muted" data-kt-translate="new-password-hint">Use 8 or more characters with a
                    mix of letters, numbers & symbols.</div>
                <!--end::Hint-->
            </div>
            <!--end::Input group=-->
            <!--begin::Input group=-->
            <div class="fv-row mb-10">
                <input class="form-control form-control-lg form-control-solid" type="password"
                    placeholder="Confirm Password" id="password_confirmation" name="password_confirmation"
                    autocomplete="off" data-kt-translate="new-password-confirm-password" />
            </div>
            <!--end::Input group=-->
            <!--begin::Actions-->
            <div class="d-flex flex-stack">
                <!--begin::Link-->
                <button id="kt_new_password_submit" class="btn btn-primary" data-kt-translate="new-password-submit">
                    <!--begin::Indicator label-->
                    <span class="indicator-label">Submit</span>
                    <!--end::Indicator label-->
                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    <!--end::Indicator progress-->
                </button>
                <!--end::Link-->
                <!--begin::Social-->
                <div class="d-flex align-items-center">
                    <div class="text-gray-400 fw-semibold fs-6 me-6" data-kt-translate="general-or">Or</div>
                    <!--begin::Symbol-->
                    <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
                        <img alt="Logo" src="{{ asset('media/svg/brand-logos/google-icon.svg') }}"
                            class="p-4" />
                    </a>
                    <!--end::Symbol-->
                    <!--begin::Symbol-->
                    <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light me-3">
                        <img alt="Logo" src="{{ asset('media/svg/brand-logos/facebook-3.svg') }}"
                            class="p-4" />
                    </a>
                    <!--end::Symbol-->
                    <!--begin::Symbol-->
                    <a href="#" class="symbol symbol-circle symbol-45px w-45px bg-light">
                        <img alt="Logo" src="{{ asset('media/svg/brand-logos/apple-black.svg') }}"
                            class="theme-light-show p-4" />
                        <img alt="Logo" src="{{ asset('media/svg/brand-logos/apple-black-dark.svg') }}"
                            class="theme-dark-show p-4" />
                    </a>
                    <!--end::Symbol-->
                </div>
                <!--end::Social-->
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Body-->
@endif

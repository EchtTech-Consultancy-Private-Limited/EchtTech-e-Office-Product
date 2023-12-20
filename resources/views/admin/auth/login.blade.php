@extends('layouts.master')
@push('form-style')
@include('layouts.partials.form_css')
@endpush
@section('style')
@endsection
@section('content')
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #F2C98A">
            <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                    <a href="{{ route('index') }}" class="py-9 mb-5">
                        <img alt="Logo" src="{{asset('assets/media/images/echttech-logo.png')}}" class="h-60px" />
                    </a>
                    <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">Welcome to E-Office</h1>
                    <!-- <p class="fw-bold fs-2" style="color: #986923;">Discover Amazing Metronic
                        <br />with great build tools
                    </p> -->
                </div>
                <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url({{asset('assets/media/illustrations/sketchy-1/13.png')}}"></div>
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row-fluid py-10">
        <div class="d-flex flex-center flex-column flex-column-fluid">
						<div class="w-lg-550px p-10 p-lg-15 mx-auto">
                        <form action="{{ route('admin.login.form') }}" method="POST" class="mt-4 mb-5" id="admin_login_form">
                        @csrf
								<div class="text-center mb-10">
									<h1 class="text-dark mb-3">Sign In to E-Office</h1>
								</div>
								<div class="mb-10 fv-row" data-kt-password-meter="true">
									<div class="mb-1">
                                            <div class="fv-row mb-10">
                                            <label class="form-label fs-6 fw-bolder text-dark">Email<em class="text-danger">*</em></label>
                                            <input class="form-control form-control-lg form-control-solid" type="text" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off"/>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
										<label class="form-label fw-bolder text-dark fs-6">Password<em class="text-danger">*</em></label>
										<div class="position-relative mb-3">
                                            <input type="password" name="password" class="form-control form-control-lg form-control-solid" placeholder="Password" id="candidate_password_2" value="{{ old('password') }}" autocomplete="off">
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
										</div>
									</div>
								</div>
                                <div class="form-group mt-4 mb-4">
                                    <div class="captcha">
                                        <span>{!! captcha_img('math') !!}</span>
                                        <button type="button" class="btn btn-danger reload" id="password_reload">
                                            ↻
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group mb-4">
                                    <input id="reset_password_captcha" type="text" class="form-control captcha" placeholder="Enter Captcha" name="captcha">
                                    @if ($errors->has('captcha'))
                                    <span class="text-danger">{{ $errors->first('captcha') }}</span>
                                    @endif
                                </div>
								<div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-sm" id="send">Login</button>
								</div>
							</form>
						</div>
					</div>
            <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                <div class="d-flex flex-center fw-bold fs-6">
                    <a href="#" class="text-muted text-hover-primary px-2" target="_blank">© 2024 E-Office, All rights reserved.</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- End this section for HTML content -->

<!-- JS script links only starts here -->
@push('js-scripts')
@include('layouts.partials.form_js')
@endpush
<!-- Custom script only starts here -->
@section('script')
<script>
jQuery('#admin_login_form').validate({
    rules: {
        email: {
            required: true,
            email:true
        },
        password: {
            required: true
        },
        captcha:{
            required:true
        },
    },
    messages: {
        email: "Email field is required",
        password: "Password field is required",
        captcha:  "Captcha is required",
    }
});
</script>
@endsection
<!-- End Custom script only starts here -->

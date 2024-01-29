@extends('admin.auth.layout.master')
@push('form-style')
@include('admin.auth.layout.partials.form_css')
@endpush
@section('style')
@endsection
@section('content')
<div>
    <div><a class="logo" href="">
            <img class="img-fluid for-light" src="{{ asset('assets/images/echttech-logo.png') }}" alt="looginpage">
            <img class="img-fluid for-dark" src="{{ asset('assets/assets/images/logo/logo_dark.png') }}" alt="looginpage"></a></div>
    <div class="login-main">
            <form action="{{ route('admin.login.form') }}" method="POST" class="theme-form" id="admin_login_form">
                @csrf
            <h4>Sign in to account</h4>
            <p>Enter your email & password to login</p>
            <div class="form-group">
                <label class="col-form-label" for="email">Email Address</label>
                <input class="form-control" id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="col-form-label" for="password">Password</label>
                <div class="form-input position-relative">
                    <input class="form-control" type="password" id="password" name="password" required="" placeholder="*********">
                    <div class="show-hide"><span class="show">                         </span></div>
                </div>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group mb-0">
                <div class="checkbox p-0">
                    <input id="checkbox1" type="checkbox">
                    <label class="text-muted" for="checkbox1">Remember password</label>
                </div>
                <div>
                    @if ($errors->has('g-recaptcha-response'))
                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                    @endif
                </div>
                <div class="text-end mt-3">
                    <button class="g-recaptcha btn btn-primary"
                            data-sitekey="{{ config('services.recaptcha.site_key') }}"
                            data-callback='onSubmit'
                            data-action='login' id="send">Login</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
<!-- End this section for HTML content -->

<!-- JS script links only starts here -->
@push('js-scripts')
@include('admin.auth.layout.partials.form_js')
@endpush
<!-- Custom script only starts here -->
@section('script')
<script src="{{ asset('assets/js/admin-auth.js') }}"></script>
@endsection
<!-- End Custom script only starts here -->

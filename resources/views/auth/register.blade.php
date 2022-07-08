@extends('layouts.auth')

@section('custom_css')
    {{-- Insert custom css here --}}
@endsection

@section('content')
    <div class="login-box">
        @if ($errors->any())
            <div>
                <div>{{ __('Whoops! Something went wrong.') }}</div>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1">{{ config('app.name', 'Laravel') }}</a>
            </div>
            <div class="card-body">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group mb-4">
                        <label>{{ __('Name') }}</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                    </div>

                    <div class="form-group mb-4">
                        <label>{{ __('Email') }}</label>
                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" required />
                    </div>

                    <div class="form-group mb-4">
                        <label>{{ __('Password') }}</label>
                        <input class="form-control" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="form-group mb-4">
                        <label>{{ __('Confirm Password') }}</label>
                        <input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <a href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <div class="form-group mt-4">
                        <button class="btn btn-primary" type="submit">
                            {{ __('Register') }}
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection

@section('custom_js')
    {{-- Insert custom js scripts here. --}}
@endsection

@extends('layouts.app2')

@section('content')



<style>
    .reset-password-container {
        padding: 60px 0;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        min-height: calc(100vh - 150px);
    }
    
    .reset-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    
    .reset-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .reset-card-header {
        background: linear-gradient(135deg, #4e73df, #224abe);
        color: white;
        padding: 1.5rem;
        font-size: 1.5rem;
        font-weight: 700;
        text-align: center;
        letter-spacing: 0.5px;
        border-bottom: none;
    }
    
    .reset-card-body {
        padding: 40px;
    }
    
    .form-control {
        height: 50px;
        border-radius: 10px;
        border: 2px solid #e9ecef;
        padding: 10px 15px;
        font-size: 1rem;
        transition: all 0.3s;
    }
    
    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
    }
    
    .btn-reset {
        background: linear-gradient(135deg, #4e73df, #224abe);
        border: none;
        border-radius: 10px;
        padding: 12px 30px;
        font-weight: 600;
        width: 100%;
        font-size: 1.1rem;
        letter-spacing: 0.5px;
        color: white;
        box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
        transition: all 0.3s;
    }
    
    .btn-reset:hover {
        background: linear-gradient(135deg, #3a5fd9, #1a3ba8);
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(78, 115, 223, 0.6);
    }
    
    .form-label {
        font-weight: 600;
        font-size: 1rem;
        color: #495057;
    }
    
    .invalid-feedback {
        font-weight: 500;
        font-size: 0.85rem;
    }
    
    .reset-icon {
        text-align: center;
        margin-bottom: 25px;
    }
    
    .reset-icon i {
        font-size: 50px;
        color: #4e73df;
        margin-bottom: 15px;
    }
    
    .reset-description {
        text-align: center;
        color: #6c757d;
        margin-bottom: 30px;
        font-size: 0.95rem;
    }
    
    .animate-fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="reset-password-container">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

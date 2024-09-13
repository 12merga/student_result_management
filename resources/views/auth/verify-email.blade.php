@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    {{-- Flash message for resent verification link --}}
                    @if (session('resent'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    {{-- Main verification instruction text --}}
                    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                    <p>{{ __('If you did not receive the email') }}, 
                        <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

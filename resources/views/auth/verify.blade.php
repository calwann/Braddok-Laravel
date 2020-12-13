@extends('layouts.template')
@section('title', 'Alterar senha')
@section('subtitle', 'Braddok')
@section('back', 'login')

@section('content')

    <div class="row container">
        <div class="card hoverable col l8 offset-l2 m10 offset-m1 s12 no-padding">
            <div class="card-action teal darken-1 white-text center-align hoverable">
                <h4>Braddok</h4>
            </div>
            <div class="card-action teal lighten-2 white-text hoverable">
                <h5>{{ __('Verify Your Email Address') }}</h5>
            </div>
            <div class="card-content hoverable">
                <div class="row">
                    @if (session('resent'))
                        <span>
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </span>
                    @endif
                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

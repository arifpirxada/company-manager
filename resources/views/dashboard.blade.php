@extends('adminlte::page')

@section('title', __('messages.company_manager'))

@section('content_header')
<h1>{{ __('messages.company_manager') }}</h1>
@stop

@section('content')
    <div class="d-flex align-items-center justify-content-center px-3">
        <div class="card shadow-lg border-0 text-center" style="max-width: 1200px; width: 100; border-radius: 1rem;">

            <div class="card-body p-4">

                <img src="/img/lock.png" alt="Locked" class="img-fluid mb-4" style="width: 80px;" />

                <h4 class="fw-semibold text-dark mb-2">
                    {{ __('messages.welcome_dashboard') }}
                </h4>

                <p class="text-muted mb-4">
                    {{ __('messages.use_below_menu') }}
                </p>

                <div class="d-flex justify-content-center gap-2">
                    <a href="/companies" type="button" class="btn btn-primary">
                        {{ __('messages.companies') }}
                    </a>
                    <a href="/employees" type="button" class="btn ml-2 btn-primary">
                        {{ __('messages.employees') }}
                    </a>
                    <form action="{{ route("logout") }}" method="post">
                        @csrf
                        <button type="submit" class="btn ml-2 btn-outline-secondary">
                            {{ __('messages.logout') }}
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
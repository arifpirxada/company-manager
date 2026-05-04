@extends('adminlte::page')

@section('title', "Company Manager")

@section('content_header')
<h1>Company Manager</h1>
@stop

@section('content')
    <div class="d-flex align-items-center justify-content-center px-3">
        <div class="card shadow-lg border-0 text-center" style="max-width: 1200px; width: 100; border-radius: 1rem;">

            <div class="card-body p-4">

                <img src="/img/lock.png" alt="Locked" class="img-fluid mb-4" style="width: 80px;" />

                <h4 class="fw-semibold text-dark mb-2">
                    Welcome to Company Manager Admin Dashboard
                </h4>

                <p class="text-muted mb-4">
                    Use below Menu
                </p>

                <div class="d-flex justify-content-center gap-2">
                    <a href="/companies" type="button" class="btn btn-primary">
                        Companies
                    </a>
                    <a href="/employees" type="button" class="btn ml-2 btn-primary">
                        Employees
                    </a>
                    <form action="{{ route("logout") }}" method="post">
                        @csrf
                        <button type="submit" class="btn ml-2 btn-outline-secondary">
                            Logout
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
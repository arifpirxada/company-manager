@extends('adminlte::page')

@section('title', "Create Employee")

@section('content_header')
<h1>Add Employee</h1>
@stop

@section('content')

<style>
    .select2-container .select2-selection--single {
        height: unset !important;
    }
</style>

<div class="card mb-3">
    <div class="card-header">
        <h3>Create Company</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('employees.store') }}" method="POST">
            @csrf

            <div class="form-group mb-2">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>

            <div class="form-group mb-2">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>

            <div class="form-group mb-2">
                <label>Company</label>
                <select name="company_id" class="form-control select2" required>
                    <option value="">Select Company</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-2">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label>Phone</label>
                <input type="number" name="phone" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create Employee</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger mt-4">
                <strong>Error</strong> There were some problems with your input.

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success mt-4">
                <strong>Success!</strong> {{ session('success') }}
            </div>
        @endif
    </div>
</div>

@stop

@section('js')

<script>
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: "Search company...",
            allowClear: true,
            width: '100%'
        });
    });
</script>
@stop
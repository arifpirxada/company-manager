@extends('adminlte::page')

@section('title', "Create Company")

@section('content_header')
<h1>Add Company</h1>
@stop

@section('content')

<div class="card mb-3">
    <div class="card-header">
        <h3>Create Company</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-2">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group mb-2">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label>Website</label>
                <input type="url" name="website" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Logo</label>
                <input type="file" name="logo" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create Company</button>
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
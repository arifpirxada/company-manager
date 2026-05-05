@extends('adminlte::page')

@section('title', "Edit Company")

@section('content_header')
<h1>Edit Company</h1>
@stop

@section('content')

<div class="card mb-3">
    <div class="card-header">
        <h3>{{ $company->name }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-2">
                <label>Name</label>
                <input type="text" name="name" value="{{ $company->name }}" class="form-control" required>
            </div>

            <div class="form-group mb-2">
                <label>Email</label>
                <input type="email" name="email" value="{{ $company->email }}" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label>Website</label>
                <input type="url" name="website" value="{{ $company->website }}" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label>Logo</label>
                <input type="file" name="logo" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>
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
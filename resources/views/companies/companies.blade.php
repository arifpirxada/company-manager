@extends('adminlte::page')

@section('title', "Manage Companies")

@section('content_header')
@if(session('success'))
    <div class="alert alert-success mt-4">
        <strong>Success!</strong> {{ session('success') }}
    </div>
@endif
<div class="d-flex justify-content-between">
    <h1>Companies</h1>
    <a href="/companies/create" class="btn btn-primary ml-2">Add New Company</a>
</div>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <table id="companiesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $company->logo) }}"
                                style="width: 35px; height: auto; margin-right: 8px;" alt="">
                            {{ $company->name }}
                        </td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>{{ $company->created_at->format('d-m-Y') }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="/companies/{{ $company->id }}/edit" class="btn btn-primary mr-2">Edit</a>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

@section('js')
<script>
    $(document).ready(function () {
        $('#companiesTable').DataTable({
            responsive: true,
            autoWidth: false,
            pageLength: 10,
            order: [[0, 'desc']],
        });
    });
</script>
@stop
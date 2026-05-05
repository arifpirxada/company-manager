@extends('adminlte::page')

@section('title', "Manage Employees")

@section('content_header')
@if(session('success'))
    <div class="alert alert-success mt-4">
        <strong>Success!</strong> {{ session('success') }}
    </div>
@endif
<div class="d-flex justify-content-between">
    <h1>Employees</h1>
    <a href="/employees/create" class="btn btn-primary ml-2">Add Employee</a>
</div>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <table id="companiesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>
                            {{ $employee->first_name }} {{ $employee->last_name }}
                        </td>
                        <td>{{ $employee->company->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->created_at->format('d-m-Y') }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="/employees/{{ $employee->id }}/edit" class="btn btn-primary mr-2">Edit</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
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
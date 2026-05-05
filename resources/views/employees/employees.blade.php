@extends('adminlte::page')

@section('title', __('messages.manage_employees'))

@section('content_header')
@if(session('success'))
    <div class="alert alert-success mt-4">
        <strong>{{ __('messages.success') }}</strong> {{ session('success') }}
    </div>
@endif
<div class="d-flex justify-content-between">
    <h1>{{ __('messages.employees') }}</h1>
    <a href="/employees/create" class="btn btn-primary ml-2">{{ __('messages.add_employee') }}</a>
</div>
@stop

@section('content')

<div class="card">
    <div class="card-body" style="overflow-x: auto;">
        <table id="employeesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>{{ __('messages.id') }}</th>
                    <th>{{ __('messages.full_name') }}</th>
                    <th>{{ __('messages.company') }}</th>
                    <th>{{ __('messages.email') }}</th>
                    <th>{{ __('messages.phone') }}</th>
                    <th>{{ __('messages.created_at') }}</th>
                    <th>{{ __('messages.actions') }}</th>
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
                                <a href="/employees/{{ $employee->id }}/edit" class="btn btn-primary mr-2">{{ __('messages.edit') }}</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __('messages.delete') }}</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-4 d-flex justify-content-end mb-3">
        {{ $employees->links() }}
    </div>
</div>

@stop

@section('js')
<script>
    $(document).ready(function () {
        $('#employeesTable').DataTable({
            responsive: true,
            autoWidth: false,
            paging: false,
            info: false,
            searching: false
        });
    });
</script>
@stop
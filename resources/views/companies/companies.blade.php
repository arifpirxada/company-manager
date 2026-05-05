@extends('adminlte::page')

@section('title', __('messages.manage_companies'))

@section('content_header')
@if(session('success'))
    <div class="alert alert-success mt-4">
        <strong>{{ __('messages.success') }}</strong> {{ session('success') }}
    </div>
@endif
<div class="d-flex justify-content-between">
    <h1><strong>{{ __('messages.companies') }}</strong></h1>
    <a href="/companies/create" class="btn btn-primary ml-2">{{ __('messages.add_company') }}</a>
</div>
@stop

@section('content')

<div class="card">
    <div class="card-body" style="overflow-x: auto;">
        <table id="companiesTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>{{ __('messages.id') }}</th>
                    <th>{{ __('messages.name') }}</th>
                    <th>{{ __('messages.email') }}</th>
                    <th>{{ __('messages.website') }}</th>
                    <th>{{ __('messages.created_at') }}</th>
                    <th>{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>
                            @if ($company->logo)
                                <img src="{{ asset('storage/' . $company->logo) }}"
                                    style="width: 35px; height: auto; border-radius: 5px; margin-right: 8px;" alt="">
                            @endif
                            {{ $company->name }}
                            <span class="badge badge-info">{{ $company->employees_count }}</span>
                        </td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>{{ $company->created_at->format('d-m-Y') }}</td>
                        <td>
                            <div class="d-flex">
                                <a href="/companies/{{ $company->id }}/edit" class="btn btn-primary mr-2">{{ __('messages.edit') }}</a>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="post">
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
        {{ $companies->links() }}
    </div>
</div>

@stop

@section('js')
<script>
    $(document).ready(function () {
        $('#companiesTable').DataTable({
            responsive: true,
            autoWidth: false,
            paging: false,
            info: false,
            searching: false
        });
    });
</script>
@stop
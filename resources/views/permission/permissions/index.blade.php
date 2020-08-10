@extends('layouts.back')

@section('content')
    <div class="card mb-4">
        <div class="card-header">Create new Permission</div>
        <div class="card-body">
            <form action="{{ route('permissions.create') }}" method="post">
                @csrf
                @include('permission.permissions.partials.form-control', ['submit' => 'Create'])
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Table of Permission</div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Guard name</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                @foreach ($permissions as $index => $permission)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td>{{ $permission->created_at->format('d F Y') }}</td>
                        <td>
                            {{-- <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-primary btn-sm">edit</a> --}}
                            <div class="d-flex">
                                <form action="{{ route('permissions.edit', $permission) }}">
                                    <button class="btn btn-primary btn-sm mr-2">Edit</button>
                                </form>
                                <form action="{{ route('permissions.delete', $permission) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                            
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
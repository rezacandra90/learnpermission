@extends('layouts.back')

@section('content')
    <div class="card mb-4">
        <div class="card-header">Create new Role</div>
        <div class="card-body">
            <form action="{{ route('roles.create') }}" method="post">
                @csrf
                @include('permission.roles.partials.form-control', ['submit' => 'Create'])
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">Table of Role</div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Guard name</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                @foreach ($roles as $index => $role)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td>{{ $role->created_at->format('d F Y') }}</td>
                        <td>
                            {{-- <a href="{{ route('roles.edit', $role) }}" class="btn btn-primary btn-sm">edit</a> --}}
                            <div class="d-flex">
                                <form action="{{ route('roles.edit', $role) }}">
                                    <button class="btn btn-primary btn-sm mr-2">Edit</button>
                                </form>
                                <form action="{{ route('roles.delete', $role) }}" method="post">
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
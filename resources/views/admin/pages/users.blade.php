@extends('admin.layout.app')
@section('title', 'Users')

@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-success">
                {{ session('status') }}
            </div>
            @endif
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="#" class="fw-normal">Admin</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">User List</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">S.no</th>
                                <th class="border-top-0">Name</th>
                                <th class="border-top-0">Phone</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Address</th>
                                <th class="border-top-0">City</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($users as $user)
                            <tr id="user_id_{{ $user->id }}">
                                <td>{{ $i++ }}</td>
                                <td>{{ $user->fname }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->ResidenceProfile ? $user->ResidenceProfile->address : '-' }}</td>
                                <td>{{ '_' }}</td>
                                <td>
                                    <div class="btn-use">
                                        <ul>
                                            <li title="Edit Record"><a href="{{ url('add_family', $user->id) }}" title="View Family"><i class="fas fa-people-carry"></i></a></li>

                                            <li title="Edit Record"><a href="{{ Route('fetch_users.edit', $user->id) }}" title="Edit"><i class="fas fa-eye text-primary"></i></a></li>
                                            <li title="Delete Record" user-id="{{ $user->id }}" class="remove-user delete-record"><i class="fas fa-trash text-danger"></i></li>
                                            {{-- <li><i class="fas fa-trash"></i></li> --}}
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

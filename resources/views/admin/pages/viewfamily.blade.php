@extends('admin.layout.app')
@section('title', 'Users')

@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">family List</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="{{ url('add_family', $user_id ) }}" class="fw-normal btn btn-sm btn-success">Add Family Member</a></li>
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
                                <th class="border-top-0">Contact</th>
                                <th class="border-top-0">Relation</th>
                                <th class="border-top-0">Gender</th>
                                <th class="border-top-0">Image</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($members as $member)
                            <tr id ="member_id_{{ $member->id }}">
                                <td>{{ $i++ }}</td>
                                <td>{{ $member->member_name }}</td>
                                <td>{{ $member->member_phone }}</td>
                                <td>{{ $member->member_relation }}</td>
                                <td>{{ $member->member_gender }}</td>
                                <td>{{ $member->member_relation }}</td>
                                <td>
                                    <div class="btn-use">
                                        <ul>
                                            <li title="Edit Record"><a href="{{ url('member_edit', $member->id) }}" title="Edit"><i class="fas fa-eye text-primary"></i></a></li>
                                            <li title="Delete Record" user-id="{{ $member->id }}" class="remove-member delete-record"><i class="fas fa-trash text-danger"></i></li>
                                            
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

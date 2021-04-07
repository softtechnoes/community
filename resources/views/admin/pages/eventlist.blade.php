@extends('admin.layout.app')
@section('title', 'Event_Records')

@section('content')
<div class="page-breadcrumb bg-white">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <div class="error-field">
                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-success">
                    {{ session('status') }}
                </div>
                @elseif(!session('status'))
                <div class="form-group mb-4">
                    <div class="mb-4 font-medium text-sm text-success">
                     Event Records
                    </div>
                </div>
                
                @endif
            </div>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="{{ url('event') }}" class="fw-normal btn btn-sm btn-success">Add Event</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Event List</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">S.no</th>
                                <th class="border-top-0">Event Name</th>
                                <th class="border-top-0">Event Date </th>
                                <th class="border-top-0">Event Place</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($events as $event)
                            <tr id="event_{{ $event->id }}">
                                <td>{{ $i++ }}</td>
                                <td>{{ $event->name }}</td>
                                <td>{{ $event->date }}</td>
                                <td>{{ $event->place }}</td>
                                <td>
                                    <div class="btn-use">
                                        <ul>
                                            <li data-toggle="modal" img-id={{ $event->id }}
                                                data-target="#viewimage" class="event-image" title="View Image"><i
                                                    class="far fa-images text-primary"></i>
                                                View Image
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-use">
                                        <ul>
                                            <li title="Edit Record"><a
                                                    href="{{ Route('event.edit', $event->id) }}"
                                                     title="Edit"><i class="fas fa-edit"></i></a></li>
                                            <li title="Delete Record" event-id ="{{ $event->id }}"
                                                class="event-remove"><i class="fas fa-trash text-danger"></i>
                                            </li>
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

<div class="modal fade" id="viewimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>
@endsection

@extends('admin.layout.app')
@section('title', 'NewsList')

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
                       News record
                    </div>
                </div>
                
                @endif
            </div>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                    <li><a href="{{ url('news') }}" class="fw-normal btn btn-sm btn-success">Create News</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">News List</h3>
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">S.no</th>
                                <th class="border-top-0">Title</th>
                                <th class="border-top-0">Description</th>
                                <th class="border-top-0">Place</th>
                                <th class="border-top-0">Date</th>
                                <th class="border-top-0">Time</th>
                                <th class="border-top-0">Image</th>
                                <th class="border-top-0">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach ($news_data as $news)
                            <tr id="news_id_{{ $news->id }}">
                                <td>{{ $i++ }}</td>
                                <td>{{ $news->title }}</td>
                                <td>{{ $news->sort_description }}</td>
                                <td>{{ $news->place }}</td>
                                <td>{{ $news->date}}</td>
                                <td>{{ $news->time }}</td>
                                <td>
                                    <div class="btn-use">
                                        <ul>
                                            <li data-toggle="modal" img-id={{ $news->id }}
                                                data-target="#viewimage" class="New-image" title="View Image"><i
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
                                                    href="{{ Route('news.edit', $news->id) }}"
                                                     title="Edit"><i class="fas fa-edit"></i></a></li>
                                            <li title="Delete Record" news-id ="{{ $news->id }}"
                                                class="news_remove"><i class="fas fa-trash text-danger"></i>
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

@extends('admin.layout.layout')

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Konsultasi</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Zoom</li>
                        </ol>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <button id="add-zoom-btn" href="javascript:void(0);" class="btn btn-primary btn-icon text-white me-2">
                            <span>
                                <i class="fe fe-plus"></i>
                            </span> Add Zoom
                        </button>
                        {{-- <a href="javascript:void(0);" class="btn btn-success btn-icon text-white">
                            <span>
                                <i class="fe fe-log-in"></i>
                            </span> Export Data User
                        </a> --}}
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <div class="row mb-4">
                    <div class="col-lg-12 col-md-12">
                        @include('components.messages')
                    </div>    
                </div>

                <!-- ROW-1 OPEN -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="panel panel-primary">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Zoom</h3>
                                </div>
                                
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="zoom-table" class="table border text-nowrap text-md-nowrap table-bordered table-striped mg-b-0">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Title</th>
                                                        <th class="text-center">Meeting Number</th>
                                                        <th class="text-center">Passcode</th>
                                                        <th class="text-center">SDK Key</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data_zoom as $zoom)
                                                    <tr>
                                                        <td>{{$zoom->title}}</td>
                                                        <td>{{$zoom->meeting_number}}</td>
                                                        <td>{{$zoom->passcode}}</td>
                                                        <td>{{$zoom->sdk_key}}</td>
                                        
                                                        <td class="text-center">
                                                            <div class="btn-list">
                                                                <button id="edit-zoom-btn" key_id="{{ $zoom->id }}" key_passcode="{{ $zoom->passcode }}" key_title="{{ $zoom->title }}" key_meeting_number ="{{ $zoom->meeting_number }}" key_sdk_key ="{{ $zoom->sdk_key }}" type="button" class="btn btn-icon  btn-success"><i class="fe fe-edit"></i></button>
                                                                <button id="delete-zoom-btn" key_id="{{ $zoom->id }}" key_title="{{ $zoom->title }}" type="button" class="btn btn-icon  btn-danger"><i class="fe fe-trash"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                        
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            {{$data_zoom->links()}}
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->
    </div>

    {{-- modals --}}
    {{-- modal-add-zoom --}}
    <div class="modal fade" id="modal-add-zoom" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Zoom</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/add_zoom') }}" method="post">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Title
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-title" type="text" name="title" class="form-control"
                                    placeholder="Title">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Meeting Number
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-meeting-number" type="text" name="meeting_number" class="form-control"
                                    placeholder="Meeting Number">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Passcode
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-passcode" type="text" name="passcode" class="form-control"
                                    placeholder="Passcode">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    SDK Key
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-sdk-key" type="text" name="sdk_key" class="form-control"
                                    placeholder="SDK Key">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal-edit-zoom --}}
    <div class="modal fade" id="modal-edit-zoom" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Zoom</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/edit_zoom') }}" method="post">
                        @csrf

                        <div class="col-md-12" style="display: none">
                            <div class="form-group">
                                <label class="form-label">
                                    Id
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-id" type="text" name="id" class="form-control"
                                    placeholder="Id">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Title
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-title" type="text" name="title" class="form-control"
                                    placeholder="Title">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Meeting Number
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-meeting-number" type="text" name="meeting_number" class="form-control"
                                    placeholder="Meeting Number">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Passcode
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-passcode" type="text" name="passcode" class="form-control"
                                    placeholder="Passcode">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    SDK Key
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-sdk-key" type="text" name="sdk_key" class="form-control"
                                    placeholder="SDK Key">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    

    {{-- modal-delete-role --}}
    <div class="modal fade"  id="modal-delete-zoom">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" ><span aria-hidden="true">&times;</span></button>
                    <i class="fe fe-trash fs-65 text-danger lh-1 mb-5 d-inline-block"></i>
                    <h4 class="text-danger">Yakin data zoom?</h4>
                    <p class="mg-b-20 mg-x-20">Anda akan menghapus room zoom <span id="title-zoom"></span></p>
                    <form action="{{url('delete_zoom')}}" method="post">
                        @csrf
                        <input type="text" name="id" id="input-id" style="display: none">
                        <button type="submit" aria-label="Close" class="btn btn-danger pd-x-25" data-bs-dismiss="modal" >Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
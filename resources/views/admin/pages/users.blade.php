@extends('admin.layout.layout')

@section('content')
    <div class="main-content app-content mt-0">
        <div class="side-app">

            <!-- CONTAINER -->
            <div class="main-container container-fluid">

                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Users Management</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <button id="btn-add-user" class="btn btn-primary btn-icon text-white me-2">
                            <span>
                                <i class="fe fe-plus"></i>
                            </span> Add User
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
                                    <h3 class="card-title">Data Users</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="user-table"
                                            class="table border text-nowrap text-md-nowrap table-bordered table-striped mg-b-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center">Username</th>
                                                    <th class="text-center">Email</th>
                                                    <th class="text-center">Fungsi</th>
                                                    <th class="text-center" colspan="2">Role</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_users as $user)
                                                    <tr>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->username }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        @if ($user->get_fungsi)
                                                            <td>{{ $user->get_fungsi->nama_fungsi }}</td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                        <td class="text-center">

                                                            <div class="tags">
                                                                @foreach ($user->roles->pluck('name') as $role)
                                                                    <span class="tag tag-blue">{{ $role }}</span>
                                                                @endforeach
                                                            </div>

                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" id="edit-role-btn"
                                                                key_id="{{ $user->id }}" key_name="{{ $user->name }}"
                                                                key_role="{{ $user->roles->pluck('name') }}"
                                                                class="btn btn-icon  btn-success"><i
                                                                    class="fe fe-edit"></i></button>
                                                        </td>
                                                        <td class="text-center">

                                                            <div class="btn-list">
                                                                <button type="button" id="edit-user-btn"
                                                                    key_id="{{ $user->id }}"
                                                                    key_name="{{ $user->name }}"
                                                                    key_email="{{ $user->email }}"
                                                                    key_fungsi="{{ $user->fungsi }}"
                                                                    key_username="{{ $user->username }}"
                                                                    key_role="{{ $user->roles->pluck('name') }}"
                                                                    class="btn btn-icon  btn-success"><i
                                                                        class="fe fe-edit"></i></button>

                                                                <button type="button" id="delete-user-btn"
                                                                    key_id="{{ $user->id }}"
                                                                    key_name="{{ $user->name }}"
                                                                    class="btn btn-icon  btn-danger"><i
                                                                        class="fe fe-trash"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        {{ $data_users->links() }}
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
    {{-- modal-add-user --}}
    <div class="modal fade" id="modal-add-user" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/add_user') }}" method="post">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Username
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-username" type="text" name="username" class="form-control"
                                    placeholder="Username">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Password
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-password" type="password" name="password" class="form-control"
                                    placeholder="Password">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Email
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-email" type="email" name="email" class="form-control"
                                    placeholder="Email">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Nama Lengkap
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-nama" type="text" name="name" class="form-control"
                                    placeholder="Nama Lengkap">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Fungsi
                                    <span class="text-red">*</span>
                                </label>
                                <select id="input-fungsi" name="fungsi" class="form-control"
                                    data-bs-placeholder="Select" tabindex="-1" aria-hidden="true">
                                    <option value="" selected disabled>-- Pilih Fungsi --</option>
                                    @foreach ($data_fungsi as $fungsi)
                                        <option value="{{ $fungsi->id }}">{{ $fungsi->nama_fungsi }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Role
                                    <span class="text-red">*</span>
                                </label>
                                <select id="input-role" name="role" class="form-control" data-bs-placeholder="Select"
                                    tabindex="-1" aria-hidden="true">
                                    <option value="" selected disabled>-- Pilih Role --</option>
                                    @foreach ($data_roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach

                                </select>
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

    {{-- modal-edit-user --}}
    <div class="modal fade" id="modal-edit-user" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/edit_user') }}" method="post">
                        @csrf

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Id
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-id" type="text" name="id" class="form-control"
                                    placeholder="id">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Username
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-username" type="text" name="username" class="form-control"
                                    placeholder="Username">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Email
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-email" type="email" name="email" class="form-control"
                                    placeholder="Email">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">
                                    Nama Lengkap
                                    <span class="text-red">*</span>
                                </label>
                                <input id="input-nama" type="text" name="name" class="form-control"
                                    placeholder="Nama Lengkap">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Fungsi
                                    <span class="text-red">*</span>
                                </label>
                                <select id="input-fungsi" name="fungsi" class="form-control"
                                    data-bs-placeholder="Select" tabindex="-1" aria-hidden="true">
                                    <option value="" selected disabled>-- Pilih Fungsi --</option>
                                    @foreach ($data_fungsi as $fungsi)
                                        <option value="{{ $fungsi->id }}">{{ $fungsi->nama_fungsi }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Role
                                    <span class="text-red">*</span>
                                </label>
                                <select id="input-role" name="role" class="form-control" data-bs-placeholder="Select"
                                    tabindex="-1" aria-hidden="true">
                                    <option value="" selected disabled>-- Pilih Role --</option>
                                    @foreach ($data_roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach

                                </select>
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

    {{-- modal-delete-user --}}
    <div class="modal fade" id="modal-delete-user">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4">
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span
                            aria-hidden="true">&times;</span></button>
                    <i class="fe fe-trash fs-65 text-danger lh-1 mb-5 d-inline-block"></i>
                    <h4 class="text-danger">Yakin menghapus user?</h4>
                    <p class="mg-b-20 mg-x-20">Anda akan menghapus user atas nama <span id="nama-user"></span></p>
                    <form action="{{ url('delete_user') }}" method="post">
                        @csrf
                        <input type="text" name="id" id="input-id" style="display: none">
                        <button type="submit" aria-label="Close" class="btn btn-danger pd-x-25"
                            data-bs-dismiss="modal">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal-edit-role --}}
    <div class="modal fade" id="modal-edit-role" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Role</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/edit_role_user') }}" method="post">
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
                                    Nama Lengkap
                                    <span class="text-red">*</span>
                                </label>
                                <input readonly id="input-nama" type="text" name="name" class="form-control"
                                    placeholder="Nama Lengkap">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label">Role
                                    <span class="text-red">*</span>
                                </label>
                                <select id="input-role" name="role" class="form-control" data-bs-placeholder="Select"
                                    tabindex="-1" aria-hidden="true">
                                    <option value="" selected disabled>-- Pilih Role --</option>
                                    @foreach ($data_roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach

                                </select>
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
@endsection

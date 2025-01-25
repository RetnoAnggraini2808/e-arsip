@extends('layout/app')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                          <h4 class="card-title"> Edit {{ $page }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="{{route('updaterole', ['id' => $role->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <p class="medium">
                            Edit data role
                        </p>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label class="fs-4">Name</label>
                                    <input
                                    id="role"
                                    type="text"
                                    class="form-control fs-4"
                                    placeholder="Masukkan Role"
                                    name="nama_role"
                                    id="nama_role"
                                    value="{{$role->nama_role}}"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 p-2">
                            <button
                                type="submit"
                                class="btn btn-primary"
                                style="margin-right: 10px"
                            >
                                Update
                            </button>
                            <a
                                href="{{ route('role') }}"
                                class="btn btn-danger"
                            >
                                Close
                            </a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

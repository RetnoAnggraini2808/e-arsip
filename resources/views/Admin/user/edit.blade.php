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
                    <form action="{{route('updateuser', ['id' => $user->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <p class="medium">
                            Edit akun pengguna, pastikan anda mengisi semuanya
                        </p>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label class="fs-5">Nama User</label>
                                    <input
                                      id="name"
                                      type="text"
                                      class="form-control fs-5"
                                      placeholder="Masukkan Nama User"
                                      name="name"
                                      id="name"
                                      value="{{ $user-> name }}"
                                    />
                                  </div>
                                  <div class="form-group form-group-default">
                                    <label class="fs-5">Email</label>
                                    <input
                                      id="email"
                                      type="text"
                                      class="form-control fs-5"
                                      placeholder="Masukkan email"
                                      name="email"
                                      id="email"
                                      value="{{ $user-> email }}"
                                    />
                                  </div>
                                  <div class="form-group form-group-default">
                                    <label class="fs-5">Password</label>
                                    <input
                                      id="password"
                                      type="text"
                                      class="form-control fs-5"
                                      placeholder="Masukkan password"
                                      name="password"
                                      id="password"
                                    />
                                  </div>
                                  <div class="form-group form-group-default">
                                    <label class="fs-5">Masukkan Role</label>
                                    <select class="form-select fs-5" data-select2-selector="status" id="status" name="status">
                                        @foreach ($rolee as $role )
                                        <option  value="{{ $role->id }}"<?=$role ->id== $user->status?  "selected":null?> data-bg="bg-primary" selected>{{ $role-> nama_role }}</option>
                                        @endforeach
                                    </select>
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
                                href="{{ route('user') }}"
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

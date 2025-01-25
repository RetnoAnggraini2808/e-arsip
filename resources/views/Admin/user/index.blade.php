@extends('layout/app')
@section('content')
<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h3 class="fw-bold mb-3">PTPN 4 Palm Co</h3>
      <ul class="breadcrumbs mb-3">
        <li class="nav-home">
          <a href="#">
            <i class="icon-home"></i>
          </a>
        </li>
        
        <li class="nav-item">
          <a style="font-size: 18px" href="#">{{ $page }}</a>
        </li>
        <li class="separator">
          <i data-feather="chevrons-right"></i>
          {{-- <i class="fas fa-pen-square"></i> --}}
        </li>
        <li class="nav-item">
          <a style="font-size: 18px;" href="#">Datatables</a>
        </li>
      </ul>
    </div>
    
    {{-- Main Content --}}
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">{{ $page }}</h4>
              <button
                class="btn btn-primary btn-round ms-auto"
                data-bs-toggle="modal"
                data-bs-target="#addRowModal"
              >
                <i class="fa fa-plus"></i>
                Tambah Data
              </button>
            </div>
          </div>
          <div class="card-body">
            <!-- Modal -->
            <div
              class="modal fade"
              id="addRowModal"
              tabindex="-1"
              role="dialog"
              aria-hidden="true"
            >
              <div class="modal-dialog" role="document">
                
                <div class="modal-content">
                  <div class="modal-header border-0">
                    <h5 class="modal-title">
                      <span class="fw-mediumbold"> New</span>
                      <span class="fw-light"> Data User </span>
                    </h5>
                    {{-- <button
                      type="button"
                      class="close"
                      data-dismiss="modal"
                      aria-label="Close"
                    >
                      <span aria-hidden="true">&times;</span>
                    </button> --}}
                  </div>
                  <form action="{{route('add_user')}}" method="POST">
                    @csrf
                  <div class="modal-body">
                    <p class="small">
                      Buat data baru menggunakan formulir ini, pastikan Anda mengisi semua kolom
                    </p>
                    
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default">
                            <label>Nama User</label>
                            <input
                              id="name"
                              type="text"
                              class="form-control"
                              placeholder="Masukkan Nama User"
                              name="name"
                              id="name"
                            />
                          </div>
                          <div class="form-group form-group-default">
                            <label>Email</label>
                            <input
                              id="email"
                              type="text"
                              class="form-control"
                              placeholder="Masukkan email"
                              name="email"
                              id="email"
                            />
                          </div>
                          <div class="form-group form-group-default">
                            <label>Password</label>
                            <input
                              id="password"
                              type="text"
                              class="form-control"
                              placeholder="Masukkan password"
                              name="password"
                              id="password"
                            />
                          </div>
                          <div class="form-group form-group-default">
                            <label>Masukkan Role</label>
                            <select class="form-select" data-select2-selector="status" id="status" name="status">
                                @foreach ($rolee as $role )
                                <option value="{{ $role->id }}" data-bg="bg-primary" selected>{{ $role-> nama_role }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer border-0">
                    <button
                      type="submit"
                      class="btn btn-primary"
                    >
                      Add
                    </button>
                    <button
                      type="button"
                      class="btn btn-danger"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                  </div>
                </div>
              </form>
              </div>
            </div>

            <div class="table-responsive">
              <table
                id="add-row"
                class="display table table-striped table-hover"
              >
                <thead>
                  <tr>
                    <th>no</th>
                    <th>nama user</th>
                    <th>email</th>
                    <th>role</th>
                    <th>status</th>
                    <th style="width: 10%">Action</th>
                  </tr>
                </thead>
                {{-- <tfoot>
                  <tr>
                    <th>no</th>
                    <th>nama user</th>
                    <th>email</th>
                    <th>role</th>
                    <th>status</th>
                    <th>Action</th>
                  </tr>
                </tfoot> --}}
                <tbody>
                  @php
                    $no = 1;   
                    @endphp
                    @foreach ($user as $user)
                  <tr>
                    <td class="fs-5"><?=$no?></td>
                    <td class="fs-5">{{$user->name}}</td>
                    <td class="fs-5">{{$user->email}}</td>
                    <td>
                        @if($user->status=='1')
                        <span class="badge bg-success text-wrap fs-6">{{$user->nama_role}}</span> 
                        @else ($user->status=='2')
                        <span class="badge bg-success text-wrap fs-6">{{$user->nama_role}}</span> 
                        @endif
                    </td>
                    <td>
                        @if($user->is_active=='1')
                            <span class="badge bg-success text-wrap fs-6">Aktif</span> 
                        @else ($user->status=='2')
                            <span class="badge bg-danger text-wrap fs-6">Non Aktif</span> 
                        @endif
                    </td>
                    <td class="fs-5">
                        <div class="hstack gap-4 text-nowrap">
                            <a href="{{route('statususer', ['id' => $user->id])}}" class="btn btn-warning">
                                <span>Status Data</span>
                            </a>
                            <a href="{{route('edituser', ['id' => $user->id])}}" class="btn btn-info">
                                <span>Edit Data</span>
                            </a>
                            <a href="{{route('userhapus', ['id' => $user->id])}}" class="btn btn-danger">
                                <span>Hapus Data</span>
                            </a>
                        </div>
                    </td>
                  </tr>
                  @php
                      $no ++;
                  @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
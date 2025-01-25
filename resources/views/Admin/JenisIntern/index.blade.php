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
                      <span class="fw-light"> {{ $page }} </span>
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
                  <form action="{{route('add_jenisintern')}}" method="POST">
                    @csrf
                  <div class="modal-body">
                    <p class="small">
                      Tambahkan data surat intern
                    </p>
                    
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default">
                            <label>Nama Jenis Surat Intern</label>
                            <input
                              name="jenisintern"
                              id="jenisintern"
                              type="text"
                              class="form-control"
                              placeholder="Masukkan Jenis Surat Intern"
                            />
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
                    <th>nama Jenis Intern</th>
                    <th style="width: 10%">Action</th>
                  </tr>
                </thead>
                {{-- <tfoot>
                  <tr>
                    <th>no</th>
                    <th>Nama Jenis Intern</th>
                    <th>Action</th>
                  </tr>
                </tfoot> --}}
                <tbody>
                  @php
                    $no = 1;   
                    @endphp
                    @foreach ($jenisSuratIntern as $jenisSuratIntern)
                  <tr>
                    <td class="fs-5"><?=$no?></td>
                    <td class="fs-5">{{$jenisSuratIntern->jenis_intern}}</td>
                    <td class="fs-5">
                        <div class="form-button-action gap-4">
                            <a
                              href="{{route('JenisSuratInternEdit', ['id' => $jenisSuratIntern->id])}}"
                              data-bs-toggle="tooltip"
                              title=""
                              class="btn btn-info"
                              data-original-title="Edit Task"
                            >
                              <i class="fa fa-edit"></i>
                            </a>
                            <a
                              href="{{route('JenisSuratIntern.hapus', ['id' => $jenisSuratIntern->id])}}"
                              data-bs-toggle="tooltip"
                              title=""
                              class="btn btn-danger"
                              data-original-title="Remove"
                              style="margin-left: 5px"
                            >
                              <i class="fa fa-times"></i>
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
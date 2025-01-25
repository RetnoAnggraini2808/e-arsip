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
              @if ($name->status===1)
                
              @else
                <button
                  class="btn btn-primary btn-round ms-auto"
                  data-bs-toggle="modal"
                  data-bs-target="#addRowModal"
                >
                  <i class="fa fa-plus"></i>
                  Tambah Data
                </button>
              @endif
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
                  <form action="{{route('add_dataintern')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="modal-body">
                    <p class="small">
                      Buat data baru, pastikan anda mengisi semuanya
                    </p>
                    
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group form-group-default">
                            <label>Kode Data Surat Intern</label>
                            <input
                              name="kode_suratintern" id="kode_suratintern"
                              class="form-control"
                              placeholder="Masukkan Kode SK"
                             
                            />
                          </div>
                          <div class="form-group form-group-default">
                            <label>Tanggal</label>
                            <input
                              type="date"
                              class="form-control"
                              placeholder="Masukkan Tanggal"
                              name="tanggal_suratintern" id="tanggal_suratintern"
                            />
                          </div>
                          <div class="form-group form-group-default">
                            <label>Perihal</label>
                            <input
                              type="text"
                              class="form-control"
                              placeholder="Masukkan Perihal"
                              name="perihal" id="perihal"
                            />
                          </div>
                          <div class="form-group form-group-default">
                            <label>Masukkan File</label>
                            <input
                              type="file"
                              class="form-control"
                              placeholder="Masukkan Nama File"
                              name="nama_file"
                              id="nama_file"
                            />
                          </div>
                          <div class="form-group form-group-default">
                            <label>Masukkan Jenis Surat Intern</label>
                            <select class="form-control" data-select2-selector="jenis_intern" id="jenis_intern" name="jenis_intern">
                              <option value="" data-bg="bg-primary" selected disabled>Masukkan Jenis Surat</option>
                                @foreach ($jenisSuratIntern as $jenisSuratIntern )
                                    <option value="{{ $jenisSuratIntern->id }}" data-bg="bg-primary">{{ $jenisSuratIntern->jenis_intern }}</option>
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
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Perihal</th>
                    <th>Nama File</th>
                    <th>Jenis Surat</th>
                    <th style="width: 10%">Action</th>
                  </tr>
                </thead>
                {{-- <tfoot>
                  <tr>
                    <th>no</th>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Perihal</th>
                    <th>Nama File</th>
                    <th>Action</th>
                  </tr>
                </tfoot> --}}
                <tbody>
                  @php
                    $no = 1;   
                    @endphp
                    @foreach ($datasuratintern as $datasuratintern)
                  <tr>
                    <td class="fs-5"><?=$no?></td>
                    <td class="fs-5">{{$datasuratintern->kode_suratintern}}</td>
                    <td class="fs-5">{{$datasuratintern->tanggal_suratintern}}</td>
                    <td class="fs-5">{{$datasuratintern->perihal}}</td>
                    <td class="fs-5">
                        <a href="{{ url($datasuratintern->nama_file) }}" target="_blank" class="btn btn-md btn-secondary">
                            <span>Lihat File</span>
                        </a>
                    </td>
                    <td class="fs-5">{{$datasuratintern->jenis_intern}}</td>
                    <td class="fs-5">
                      @if ($name->status===1)
                        <div class="hstack gap-4 text-nowrap">
                          <a href="{{ asset($datasuratintern->nama_file) }}" class="btn btn-md btn-success" download="">
                              <span>Download</span>
                          </a>
                        </div>
                      @else
                        <div class="hstack gap-4 text-nowrap">
                            <a href="{{ asset($datasuratintern->nama_file) }}" class="btn btn-md btn-success" download="">
                                <span>Download</span>
                            </a>
                            <a href="{{route('editSuratIntern', ['id' => $datasuratintern->id_dataintern])}}" class="btn btn-md btn-info">
                                <span>Edit Data</span>
                            </a>
                            <a href="{{route('datasuratinternhapus', ['id' => $datasuratintern->id_dataintern])}}" class="btn btn-md btn-danger">
                                <span>Hapus Data</span>
                            </a>
                        </div>
                      @endif
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
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
                    <form action="{{route('updatesk',  ['id' => $DataSk->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <p class="medium">
                            Edit data sk, pastikan anda mengisinya semua
                        </p>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Kode Data Sk</label>
                                    <input
                                      value="{{ $DataSk->kode_sk }}" name="kode_sk" id="kode_sk"
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
                                      value="{{ $DataSk->tanggal_sk }}" name="tanggal_sk" id="tanggal_sk"
                                    />
                                  </div>
                                  <div class="form-group form-group-default">
                                    <label>Perihal</label>
                                    <input
                                      type="text"
                                      class="form-control"
                                      placeholder="Masukkan Perihal"
                                      value="{{ $DataSk->perihal }}" name="perihal" id="perihal"
                                    />
                                  </div>
                                  <div class="form-group form-group-default">
                                    <label>Masukkan File</label>
                                    <input
                                      type="file"
                                      class="form-control"
                                      placeholder="Masukkan Nama File"
                                      name="nama_file" id="nama_file"
                                    />
                                    <small class="text-muted">Nama File : <a href="{{ url($DataSk->nama_file) }}" target="_blank">
                                        <span>{{ $DataSk->perihal }}</span>
                                    </a></small>
                                  </div>
                                  <div class="form-group form-group-default">
                                    <label>Masukkan Jenis SK</label>
                                    {{-- <select class="form-control" data-select2-selector="jenis_sk" id="jenis_sk" name="jenis_sk">
                                        @foreach ($jeniss as $jenis )
                                        <option value="{{ $jenis->id }}" data-bg="bg-primary" selected>{{ $jenis->nama_jenissk }}</option>
                                        @endforeach
                                    </select> --}}
                                    <select class="form-control" data-select2-selector="jenis_sk" id="jenis_sk" name="jenis_sk">
                                      @foreach ($jeniss as $jenis)
                                          <option value="{{ $jenis->id }}" 
                                              data-bg="bg-primary" 
                                              {{ $DataSk->jenis_sk == $jenis->id ? 'selected' : '' }}>
                                              {{ $jenis->nama_jenissk }}
                                          </option>
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
                                href="{{ route('datamemo') }}"
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

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
                    <form action="{{route('updatedatasuratmasuk', ['id' => $datasuratmasuk->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <p class="medium">
                            Create a new row using this form, make sure you
                            fill them all
                        </p>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Kode Data Surat Masuk</label>
                                    <input
                                      name="kode_suratmasuk" id="kode_suratmasuk"
                                      class="form-control"
                                      placeholder="Masukkan Kode SK"
                                     value="{{ $datasuratmasuk->kode_suratmasuk }}"
                                    />
                                  </div>
                                  <div class="form-group form-group-default">
                                    <label>Tanggal</label>
                                    <input
                                      type="date"
                                      class="form-control"
                                      placeholder="Masukkan Tanggal"
                                      name="tanggal_suratmasuk" id="tanggal_suratmasuk"
                                      value="{{ $datasuratmasuk->tanggal_suratmasuk }}"
                                    />
                                  </div>
                                  <div class="form-group form-group-default">
                                    <label>Perihal</label>
                                    <input
                                      type="text"
                                      class="form-control"
                                      placeholder="Masukkan Perihal"
                                      name="perihal" id="perihal"
                                      value="{{ $datasuratmasuk->perihal }}"
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
                                    <small class="text-muted">Nama File : <a href="{{ url($datasuratmasuk->nama_file) }}" target="_blank">
                                      <span>{{ $datasuratmasuk->perihal }}</span>
                                    </a></small>
                                  </div>
                                  <div class="form-group form-group-default">
                                    <label>Masukkan Jenis Surat</label>
                                    <select class="form-control" data-select2-selector="jenis_surat" id="jenis_surat" name="jenis_surat">
                                        @foreach ($jenisSuratMasuk as $jenis)
                                            <option value="{{ $jenis->id }}" 
                                                data-bg="bg-primary" 
                                                {{ $datasuratmasuk->jenis_surat == $jenis->id ? 'selected' : '' }}>
                                                {{ $jenis->nama_suratmasuk }}
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
                                href="{{ route('datasuratmasuk') }}"
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

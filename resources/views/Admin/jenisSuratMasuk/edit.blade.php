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
                    <form action="{{route('updatejenisSuratMasuk', ['id' => $jenisSuratMasuk->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <p class="medium">
                            Edit data jenis surat masuk
                        </p>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label class="fs-4">Nama Jenis Surat Masuk</label>
                                    <input
                                    id="jenisSuratMasuk"
                                    type="text"
                                    class="form-control fs-4"
                                    placeholder="Masukkan  Jenis Surat Masuk"
                                    name="jenisSuratMasuk"
                                    value="{{$jenisSuratMasuk->nama_suratmasuk}}"
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
                                href="{{ route('jenissk') }}"
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

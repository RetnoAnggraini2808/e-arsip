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
                    <form action="{{route('updateJenisSuratIntern', ['id' => $jenisSuratIntern->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <p class="medium">
                            Create a new row using this form, make sure you
                            fill them all
                        </p>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label class="fs-4">Nama Jenis Surat Masuk</label>
                                    <input
                                    id="jenisintern"
                                    type="text"
                                    class="form-control fs-4"
                                    placeholder="Masukkan  Jenis Surat Masuk"
                                    name="jenisintern"
                                    value="{{$jenisSuratIntern->jenis_intern}}"
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
                                href="{{ route('JenisSuratIntern') }}"
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

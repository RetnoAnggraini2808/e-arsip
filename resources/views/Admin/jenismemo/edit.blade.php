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
                    <form action="{{route('updatejenismemo', ['id' => $jenismemo->id])}}" method="post">
                    @csrf
                        @method('PUT')
                        <p class="medium">
                            Edit data jenis memo
                        </p>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label class="fs-4">Nama Jenis SK <span class="text-danger">*</span></label>
                                    <input
                                    id="nama_jenissk"
                                    type="text"
                                    class="form-control fs-4"
                                    placeholder="Masukkan Role"
                                    name="nama_jenismemo"
                                    value="{{$jenismemo->nama_jenismemo}}"
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
                                href="{{ route('jenismemo') }}"
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

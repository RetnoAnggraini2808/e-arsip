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
                </div>
              </div>
          <div class="card-body">
            <div class="table-responsive">
              <table
                id="add-row"
                class="display table table-striped table-hover"
              >
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Waktu</th>
                    <th>Pengguna</th>
                    <th>Jenis Aksi</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($histories as $h)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    {{-- <td>{{ Carbon\Carbon::parse($h->tanggal)->format('d F Y') }}</td> --}}
                    <td>{{ Carbon\Carbon::parse($h->tanggal)->format('d F Y H:i:s') }}</td>
                    <td>{{ $h->name }}</td>
                    <td>{{ $h->jenis_aksi }}</td>
                    <td>{{ $h->keterangan }}</td>
                  </tr>
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
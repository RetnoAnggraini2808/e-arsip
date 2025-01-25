@extends('layout/app')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
      </ul>
    </div>
    
    {{-- Main Content --}}
    <h1 style="text-align: center">SELAMAT DATANG DI SISTEM E-ARSIP <br> PTPN IV PALM CO</h1>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <div style="width: 60%; margin: 50px auto;">
                  <h4 style="text-align: center">Distribusi Arsip Berdasarkan Kategori</h4><br>
                  <canvas id="dataPieChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    const pieData = {
            labels: ['Data SK', 'Surat Masuk', 'Memo','Surat Intern'], // Kategori
            datasets: [{
                label: 'Jumlah Data',
                data: [{{ $countDataSk }}, {{ $countDataSuratMasuk }}, {{ $countDataMemo }},{{ $countDataIntern }}], // Data jumlah
                backgroundColor: [
                    'rgba(62, 205, 54, 0.8)',
                    'rgba(109, 227, 199, 0.8)',
                    'rgba(189, 219, 34, 0.8)',
                    'rgba(219, 133, 34, 0.8)'
                ],
                borderColor: [
                    'rgba(1, 6, 5, 0.8)',
                    'rgba(1, 6, 5, 0.8)',
                    'rgba(1, 6, 5, 0.8)',
                    'rgba(1, 6, 5, 0.8)'
                ],
                borderWidth: 1
            }]
        };

        // Konfigurasi Chart
        const pieConfig = {
            type: 'pie', // Jenis chart pie
            data: pieData,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        };

        // Render Chart
        const ctx = document.getElementById('dataPieChart').getContext('2d');
        new Chart(ctx, pieConfig);
</script>
@endsection
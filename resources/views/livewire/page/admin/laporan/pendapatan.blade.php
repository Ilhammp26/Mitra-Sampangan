<div>
    @include('components.partials.admin.navbar')     
    @include('components.partials.admin.sidebar')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-4">
                    <h3 class="page-title">Laporan Pendapatan</h3>
                    <p class="text-muted">Periode: {{ \Carbon\Carbon::createFromDate($year, $month ? $month : 1, 1)->translatedFormat($month ? 'F Y' : 'Y') }}</p>
                </div>
                
                <div class="col-12 mb-4 d-print-none">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4 mb-2">
                                    <label>Bulan</label>
                                    <select class="form-control" wire:model.live="month">
                                        <option value="">Semua Bulan</option>
                                        @for($m = 1; $m <= 12; $m++)
                                            <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}">{{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label>Tahun</label>
                                    <select class="form-control" wire:model.live="year">
                                        <option value="">Semua Tahun</option>
                                        @for($y = date('Y') - 5; $y <= date('Y'); $y++)
                                            <option value="{{ $y }}">{{ $y }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-4 mb-2 d-flex align-items-end">
                                    <button class="btn btn-primary w-100" onclick="window.print()">
                                        <i class="fe fe-printer mr-2"></i> Cetak Laporan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-body text-center py-5">
                            <p class="text-muted mb-2">Total Pendapatan (Bersih)</p>
                            <h1 class="display-4 font-weight-bold text-success">Rp {{ number_format($totalIncome, 0, ',', '.') }}</h1>
                            <p class="text-muted mt-2">Dari {{ $incomes->count() }} transaksi lunas</p>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <h5 class="card-title mb-0">Rincian Transaksi Pendapatan</h5>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-hover table-bordered bg-white mb-0">
                                <thead class="thead-dark">
                                <tr role="row">
                                    <th>No</th>
                                    <th>Tanggal Trx</th>
                                    <th>Invoice</th>
                                    <th>Penyewa</th>
                                    <th class="text-right">Nominal (Rp)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($incomes as $index => $income)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $income->created_at->format('d M Y H:i') }}</td>
                                    <td><strong>{{ $income->invoice_code }}</strong></td>
                                    <td>{{ $income->user->name ?? '-' }}</td>
                                    <td class="text-right">{{ number_format($income->jumlah_bayar, 0, ',', '.') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">Tidak ada data pendapatan untuk periode ini.</td>
                                </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                    <tr class="font-weight-bold bg-light">
                                        <td colspan="4" class="text-right">Total</td>
                                        <td class="text-right">Rp {{ number_format($totalIncome, 0, ',', '.') }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>          
        </div> 
    </main>

    <style>
        @media print {
            .navbar, .sidebar-left, .d-print-none, .vertnav {
                display: none !important;
            }
            .main-content {
                margin-left: 0 !important;
                padding-top: 0 !important;
            }
            .card {
                border: none !important;
                box-shadow: none !important;
            }
            .table-bordered th, .table-bordered td {
                border: 1px solid #dee2e6 !important;
            }
        }
    </style>
</div>

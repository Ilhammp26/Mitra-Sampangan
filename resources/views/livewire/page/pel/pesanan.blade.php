<div>
    @include('components.partials.pel.navbar')
    <main role="main" class="customer-content">
        <div class="content-wrapper mx-auto"> 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center my-3">
                        <div class="col">
                            <h3 class="page-title">Riwayat Pesanan</h3>
                        </div>
                    </div>
                    <table class="table border table-hover bg-white">
                        <thead>
                            <tr role="row">
                                <th>#</th>
                                <th>Invoice</th>
                                <th>Tanggal Pesan</th>
                                <th>Tanggal Main</th>
                                <th>Waktu Main</th>
                                <th>Total Waktu</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>INV-0101001</td>
                                <td>2020-12-26 01:32:21</td>
                                <td>01-01-2026</td>
                                <td>18.00 - 20.00 WIB</td>
                                <td>2 Jam</td>
                                <td>Rp 200.000</td>
                                <td><span class="badge badge-pill badge-success mr-2">Selesai</span></td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- <nav aria-label="Table Paging" class="my-3">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav> --}}
                </div> <!-- .col-12 -->
            </div>
        </div> <!-- .container-fluid -->
        </div> <!-- .content-wrapper -->
    </main> <!-- main -->
</div>

{{-- </x-layouts.app> --}}


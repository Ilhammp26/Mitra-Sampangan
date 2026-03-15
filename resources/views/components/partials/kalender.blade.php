<section>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="row align-items-center my-3">
                <div class="col">
                    <h3 class="page-title">Jadwal</h3>
                </div>
                <div class="col-auto">
                    @auth
                    <a href="{{ route('booking.pesan') }}" class="btn btn-primary"><span class="fe fe-plus fe-16 mr-3"></span>Pesan</a>

                    {{-- <button type="button" class="btn" data-toggle="modal" data-target=".modal-calendar">
                    <span class="fe fe-filter fe-16 text-muted"></span></button> --}}
                    {{-- <button type="button" wire:click="openModal" class="btn btn-primary" data-toggle="modal" data-target="#eventModal"><span class="fe fe-plus fe-16 mr-3"></span>Pesan</button> --}}
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary">Pesan Sekarang</a>
                    @endauth
                </div>
            </div>
            <div id='calendar'></div>
            <!-- Event Detail Modal -->
            <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="varyModalLabel">Detail Jadwal</h5>
                            <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-4 text-center">
                            <div class="mb-3">
                                <span class="fe fe-user fe-32 text-primary mb-2 d-block"></span>
                                <h4 id="modalBookerName" class="mb-0">Nama Pemesan</h4>
                            </div>
                            <hr>
                            <div class="mb-2">
                                <span class="text-muted small d-block">Tanggal Main</span>
                                <strong id="modalBookerDate">Tanggal</strong>
                            </div>
                            <div>
                                <span class="text-muted small d-block">Waktu Main</span>
                                <strong id="modalBookerTime">Waktu</strong>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div> <!-- event detail modal -->
        </div> <!-- .col-12 -->
    </div>
</section>
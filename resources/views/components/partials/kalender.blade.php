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
            <!-- new event modal -->
            <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="varyModalLabel">Pesanan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="date-input1">Tanggal Main</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
                            </div>
                                <input type="text" class="form-control drgpicker" id="drgpicker-start" value="04/24/2020">
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="startDate">Jam Main</label>
                            <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="button-addon-time"><span class="fe fe-clock fe-16"></span></div>
                            </div>
                                <input type="text" class="form-control time-input" id="start-time" placeholder="10:00 AM">
                            </div>
                        </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group">
                            <label>Waktu Main</label>
                            <div class="input-group">
                            <button type="button" class="btn btn-primary mr-2">1 Jam</button>
                            <button type="button" class="btn btn-primary mr-2">2 Jam</button>
                            <button type="button" class="btn btn-primary mr-2">3 Jam</button>
                            <button type="button" class="btn btn-primary mr-2">4 Jam</button>
                            <button type="button" class="btn btn-primary">5 Jam</button> 
                            </div>
                        </div>
                        </div>
                    </form>
                    </div>
                    <div class="modal-footer d-flex justify-content-end">
                    <button type="button" class="btn mb-2 btn-danger" data-dismiss="modal">Batal</button>
                    {{-- <button type="button" class="btn mb-2 btn-danger">Batal</button> --}}
                    <button type="button" class="btn mb-2 btn-primary">Pesan</button>
                    </div>
                </div>
                </div>
            </div> <!-- new event modal -->
        </div> <!-- .col-12 -->
    </div>
</section>
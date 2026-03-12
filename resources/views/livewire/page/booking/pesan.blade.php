<div>
    <main role="main" class="customer-content">
        <div class="content-wrapper mx-auto"> 
        <div class="container">
            <div class="row justify-content-center">
                <div class="card shadow mb-4">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <a href="{{ url()->previous() }}" class="back-arrow me-2"><span class="fe fe-arrow-left fe-20 mr-2"></span></a>
                                <h3 class="page-title mb-0">Booking Lapangan</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center">
                            <div class="form-group col-md-6 mt-4">
                                <label for="date-input1">Tanggal Main<strong class="text-danger">*</strong></label>
                                <div class="input-group">
                                    <input type="text" class="form-control drgpicker" id="date-input1" value="{{ now()->format('m/d/Y') }}" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
                                        </div>
                                    </div>
                                </div>   
                                <div class="form-group col-md-6 mt-4">
                                    <label for="custom-select">Waktu Main<strong class="text-danger">*</strong></label>
                                    <select class="custom-select" id="custom-select">
                                        <option selected>Pilih waktu main</option>
                                        <option value="1">09.00 WIB</option>
                                        <option value="2">10.00 WIB</option>
                                        <option value="3">11.00 WIB</option>
                                        <option value="4">12.00 WIB</option>
                                        <option value="5">13.00 WIB</option>
                                        <option value="6">14.00 WIB</option>
                                        <option value="7">15.00 WIB</option>
                                        <option value="8">16.00 WIB</option>
                                        <option value="9">17.00 WIB</option>
                                        <option value="10">18.00 WIB</option>
                                        <option value="11">19.00 WIB</option>
                                        <option value="12">20.00 WIB</option>
                                        <option value="13">21.00 WIB</option>
                                    </select>
                                </div>
                            </div>                          
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="form-group col-md-6 mt-0">
                                    <label for="custom-select">Jam Main<strong class="text-danger">*</strong></label>
                                    <select class="custom-select" id="custom-select">
                                        <option selected>Pilih berapa jam anda akan bermain</option>
                                        <option value="1">1 Jam</option>
                                        <option value="2">2 Jam</option>
                                        <option value="3">3 Jam</option>
                                        <option value="4">4 Jam</option>
                                        <option value="5">5 Jam</option>
                                        <option value="6">6 Jam</option>
                                        <option value="7">7 Jam</option>
                                        <option value="8">8 Jam</option>
                                        <option value="9">9 Jam</option>
                                        <option value="10">10 Jam</option>
                                        <option value="11">11 Jam</option>
                                        <option value="12">12 Jam</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 mt-0">
                                    <label for="custom-select">Tambahan Wasit  <strong class="text-danger">(Jika dibutuhkan)</strong></label>
                                    <select class="custom-select" id="custom-select">
                                        <option selected>Pilih jumlah wasit</option>
                                        <option value="1">1 Wasit</option>
                                        <option value="2">3 Wasit</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2 px-4">
                                <a href="{{ url()->previous() }}" class="btn mb-2 btn-danger">Batal</a>
                                <button type="button" class="btn mb-2 btn-primary">Pesan</button>
                            </div>
                            {{-- <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-end">
                                    <div class="col-md-6 mt-0">
                                        <a href="#" class="btn btn-danger me-2">Batal</a>
                                        <button type="submit" class="btn btn-primary">Pesan</button>
                                    </div>                                    
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-12 d-flex justify-content-end mt-3">
                            <a href="#" class="btn btn-danger me-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Pesan</button>
                        </div>
                    </div> --}}
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->                        
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        </div> <!-- .content-wrapper -->
    </main> <!-- main -->
</div>

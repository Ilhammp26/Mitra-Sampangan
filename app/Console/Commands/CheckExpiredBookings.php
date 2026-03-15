<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\BookingService;

class CheckExpiredBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:check-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Batalkan otomatis booking yang sudah lewat batas waktu pembayaran';

    /**
     * Execute the console command.
     */
    public function handle(BookingService $service)
    {
        $count = $service->cancelExpiredBookings();
        $this->info("Berhasil membatalkan $count pesanan yang kedaluwarsa.");
    }
}

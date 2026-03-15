<?php

namespace App\Livewire\Page\Booking;

use Livewire\Component;
use App\Models\Lapangan;
use App\Services\BookingService;
use Livewire\Attributes\Validate;

class Pesan extends Component
{
    #[Validate('required|date')]
    public $tanggal;

    #[Validate('required')]
    public $jam_mulai;

    #[Validate('required|integer|min:1')]
    public $durasi = 1;

    public function mount()
    {
        $this->tanggal   = date('Y-m-d');
        $this->jam_mulai = '';
    }

    public function updatedTanggal()
    {
        // Reset time when date changes, so user picks again
        $this->jam_mulai = '';
    }

    public function getAvailableHoursProperty(): array
    {
        $hours = [];
        $today = date('Y-m-d');
        $currentHour = (int) date('H'); // current server hour

        for ($i = 6; $i <= 23; $i++) {
            // If today is selected, skip hours that have already passed
            if ($this->tanggal === $today && $i <= $currentHour) {
                continue;
            }
            $hours[] = $i;
        }

        return $hours;
    }

    public function submit(BookingService $service)
    {
        $this->validate();

        // There is only one field — auto-fetch it
        $lapangan = Lapangan::firstOrFail();

        $mulai   = $this->jam_mulai;
        $selesai = date('H:i:s', strtotime($mulai) + ($this->durasi * 3600));
        $harga   = $lapangan->harga * $this->durasi;

        // Only wrap the service call — NOT the redirect.
        // If the redirect is inside the catch, a routing error would silently
        // create a booking with no payment page, causing duplicate entries.
        $booking = null;
        try {
            $booking = $service->createBooking(
                auth()->id(),
                $this->tanggal,
                $mulai,
                $selesai,
                $harga
            );
        } catch (\Exception $e) {
            $this->addError('bookingError', $e->getMessage());
            return; // Stop here — no booking was created
        }

        // Redirect is outside try/catch so routing errors surface properly
        return redirect()->route('payment.upload', $booking->invoice_code);
    }

    public function render()
    {
        $title['title'] = 'Booking - MITRA SAMPANGAN';
        return view('livewire.page.booking.pesan')->layoutData($title);
    }
}


<?php

namespace App\Livewire\Page\Payment;

use App\Models\Booking;
use App\Services\PaymentService;
use Livewire\Component;
use Livewire\WithFileUploads;

class Upload extends Component
{
    use WithFileUploads;

    public $booking;
    public $proof;

    public function mount($invoice_code)
    {
        $this->booking = Booking::where('invoice_code', $invoice_code)
            ->where('user_id', auth()->id())
            ->firstOrFail();
    }

    public function submit(PaymentService $service)
    {
        $this->validate([
            'proof' => 'required|image|mimes:jpg,jpeg,png,webp|max:3072', // max 3MB
        ]);

        try {
            $service->uploadProof($this->booking, $this->proof);
            session()->flash('success', 'Bukti pembayaran berhasil diunggah! Mohon tunggu verifikasi admin.');
            return redirect()->route('pel.pesanan'); // Redirect to order list
        } catch (\Exception $e) {
            $this->addError('uploadError', $e->getMessage());
        }
    }

    public function render()
    {
        $title['title'] = 'Instruksi Pembayaran - MITRA SAMPANGAN';
        return view('livewire.page.payment.upload')->layoutData($title);
    }
}

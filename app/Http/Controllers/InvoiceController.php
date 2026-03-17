<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Enums\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    /**
     * Show the invoice for the given booking.
     *
     * @param  string  $invoiceCode
     * @return \Illuminate\View\View
     */
    public function show($invoiceCode)
    {
        $booking = Booking::where('invoice_code', $invoiceCode)->firstOrFail();

        // Ensure the user is authorized to view this invoice
        if ($booking->user_id !== Auth::id() && Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Ensure the booking is paid
        if ($booking->status !== OrderStatus::PAID) {
            // Optionally redirect or show error, but for now abort 403 or 404
            abort(404, 'Invoice not available for unpaid bookings.');
        }

        return view('pages.invoice', compact('booking'));
    }
}

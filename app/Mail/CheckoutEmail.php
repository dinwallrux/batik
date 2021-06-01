<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CheckoutEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $produkOrdered;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($produkOrdered)
    {
        $this->produkOrdered = $produkOrdered;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('yantobatik@mail.com')
            ->view('email.checkout')
            ->with([
                'orderName' => $this->produkOrdered['shipping_fullname'],
                'address' => $this->produkOrdered['shipping_address'],
            ]);
    }
}

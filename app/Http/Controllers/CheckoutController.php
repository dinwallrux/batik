<?php

namespace App\Http\Controllers;

use App\Mail\CheckoutEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        Mail::to("testing@malasngoding.com")->send(new CheckoutEmail());

		return "Email telah dikirim";
    }
}

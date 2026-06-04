<?php
namespace App\Http\Controllers;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller {
    public function index() {
        return view('contact');
    }

    public function store(Request $request) {
        $request->validate([
            'name'    => 'required|min:2',
            'email'   => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:10',
        ]);
        ContactMessage::create($request->only('name','email','phone','subject','message'));
        return back()->with('success', 'Pesan Anda telah terkirim! Tim kami akan menghubungi Anda segera.');
    }
}
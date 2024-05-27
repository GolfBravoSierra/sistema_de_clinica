<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = [
            'message' => $request->message
        ];
        try {
            Mail::send([], [], function ($message) use ($request, $data) {
                $message->to("sistemaclinica@bol.com.br")
                        ->subject($request->subject)
                        ->html($data['message']);
            });
        } catch (\Exception $e) {
            \Log::error('Failed to send email: ' . $e->getMessage());
        }

        return response()->json(['message' => 'Email sent successfully!'], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\MailSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSender extends Controller
{
    public function sendmail()
    {
        $detail = [
            'title' => 'ทดสอบการส่งเมล',
            'body' => 'เมลมาแล้วจ้า'
        ];
        Mail::to('aum_hardy@hotmail.com')->send(new MailSent($detail));
        return "ส่งละ";
    }
}

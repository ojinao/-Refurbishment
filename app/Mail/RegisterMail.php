<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function build()
    {
        return $this->to($this->email)  // 送信先アドレス
            ->subject('テストタイトル') // 件名
            ->view('auth.register.register_mail') // 本文
            ->with(['name' => $this->name]);   // 本文に送る値
    }
}

<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];
    public $password = 0;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $newPass)
    {
        $this->data = $user;
        $this->password = $newPass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@nogae.com')
                    ->subject('mon object personnalisé ')
                    ->view('email.test');
    }
}

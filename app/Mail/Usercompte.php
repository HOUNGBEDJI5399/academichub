<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
class Usercompte extends Mailable
{
    use Queueable, SerializesModels;
    

    public $user;
    public $login_identifier;
    public $temporary_password;

    /**
     * Create a new message instance.
     * 
     *     public $user;
     

     */
    public function __construct(User $user , $login_identifier , $temporary_password)
    {
        $this->user = $user;
        $this->login_identifier = $login_identifier;
        $this->temporary_password = $temporary_password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Identifiant de connexion sur ACADEMIC HUB',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.usercompte',

            with: [
                'user' => $this->user,
                'login_identifier' => $this->login_identifier,
                'temporary_password' => $this->temporary_password,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

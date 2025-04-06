<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserRegisteredMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $isReseller;
    public $isAdminEmail;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $isReseller, $isAdminEmail = false)
    {
        $this->user = $user;
        $this->isReseller = $isReseller;
        $this->isAdminEmail = $isAdminEmail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->isAdminEmail ? 'New Reseller Registered' : 'Welcome to Monkey Beanies!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: $this->isReseller
                ? ($this->isAdminEmail ? 'emails.reseller_admin' : 'emails.reseller_user')
                : 'emails.user_registered',
            with: [
                'user' => $this->user,
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

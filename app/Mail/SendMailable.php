<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    private $template;
    public $subject;
    public $visatype;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $template, $subject, $visatype)
    {
        $this->name = $name;
        $this->template = $template;
        $this->subject = $subject;
        $this->visatype = $visatype;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.'.$this->template);
    }
}
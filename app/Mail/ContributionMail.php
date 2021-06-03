<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contribution;

class ContributionMail extends Mailable
{
    use Queueable, SerializesModels;




    /**
     * The contribution instance.
     *
     * @var \App\Models\Contribution
     */
    public $contribution;



    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contribution $contribution)
    {
        //
        $this->contribution = $contribution;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');

        return $this->subject('Paiement de cotisation')->view('emails.contribution_email');
                    
    }
}

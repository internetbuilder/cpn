<?php

namespace App\Mail;

use DateTime;
use DateTimeZone;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EligibilityMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $date = new DateTime($this->data["meetingDate"]);
        $dstr = new DateTime($this->data["meetingDate"]);
        $date->setTimezone(new DateTimeZone('Europe/London'));
        $date = $date->format("l, d F Y à H:i");

        $dstr = $dstr->format("Y-m-d");

        $date = str_replace( 
            array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"),
            array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche"),
            $date
        );
        $date = str_replace(
            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
            array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'),
            $date
        );
        $data = [
            "uid" => $this->data['clientID'],
            "mid" => $this->data['meetingId'],
            "zlink" => $this->data['meetingLink'],
            "pass" => $this->data['meetingPassword'],
            "date" => $date,
            "amount" => $this->data['grantAmount'],
            "dstr" =>$dstr,
            "dend" =>$dstr,
            "ttl" =>"titre",
            "desc" =>"description",
        ];
        return $this->with("mailers.smtp")
        ->from('nepasrepondre@cpn-aide-aux-entreprises.com',"cpn-aide-aux-entreprises")
        ->to($this->data['email'])
        //->bcc("s.smida@jobid.fr")
        ->subject("Résultat de test éligibilité")
        ->markdown('mails.eligibility.result',["data"=>$data]);
    }
}

<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\sendMailN;
use App\Models\Emails;

class sendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $params;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $recipient = $this->params['data'];
        $sender = $this->params['sender'];

        //save data to database
        $saveEmail = new Emails;
        $saveEmail->user_id = $sender->id;
        $saveEmail->to = $recipient['email'];
        $saveEmail->subject = $recipient['subject'];
        $saveEmail->body = $recipient['body'];
        $saveEmail->save();

        //send mail
        \Notification::route('mail', $recipient['email'])->notify(new sendMailN($this->params));
    }
}

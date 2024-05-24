<?php

namespace App\Jobs;
use App\Mail\Alertmail;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Sendmailjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $email;
    public function __construct($email)
    {
     $this->email=$email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subscriber = Subscriber::all();
        foreach($subscriber as $subscribe){
            Mail::to($subscribe->email)->send(new Alertmail($subscribe->email));
        }
    }
}

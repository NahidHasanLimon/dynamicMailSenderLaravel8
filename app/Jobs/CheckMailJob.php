<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\CheckMailQuee;
use Mail;
use App\Models\User;

class CheckMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //
        $this->details=$details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        //
        // dd($this->details);
        $users= User::get();
        foreach ($users as $user) {
        $email = new CheckMailQuee($this->details);
            // print_r($user->email);
            Mail::to($user->email)->send($email);
        }
        // dd($user);
    // print_r($this->details);

        // dd($email);
        // dd($details);
        // for ($i=0; $i <4 ; $i++) { 
        // Mail::to($this->details['email'])->send($email);
        //     # code...
        // }
    //      foreach ($this->details['email'] as $det_email) {
    //             // Mail::to($det_email)->send($email);
    // }

    }
}

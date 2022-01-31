<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;

class Infity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'infity:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Your Email In All User';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
    //    $user= User::select('email')->get();
       $emails= User::Pluck('email')->toArray();
       $data=['title'=>'My Email ','body'=>'is Email Send By MakaaApp'];
       foreach ($emails as $email) {
           Mail::To($email)->send(new Infity($data));
       }
    }
}

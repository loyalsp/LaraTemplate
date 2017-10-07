<?php

namespace App\Console\Commands;

use Illuminate\Console\Command,
    Illuminate\Support\Facades\Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command will send an email to adnann.rasheed@gmail.com for testing cron jobs';

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
     * @return mixed
     */
    public function handle()
    {
        $user = 'Adi';
        Mail::send('mail.mail-by-cron',['user' => $user],function($m) {
            $m->from('info@email.com','admin');
            $m->to('adnann.rasheed@gmail.com','Adnan Adi');
            $m->subject('this mail is sent by artisan command');
        });
    }
}

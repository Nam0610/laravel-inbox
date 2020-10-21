<?php

namespace App\Jobs;

use App\Mail\WelcomeEmail;
use App\Model\Register;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;
    public function __construct($id)
    {
        $this->id=$id;
    }

    public function handle()
    {
       // sleep(60);
        echo 'update mail';
        $id= $this->id;
        Register::query()->where('id',$id)->update(['email'=>'abc@gmail.com']);
        echo 'kết thúc update mail';
    }
}

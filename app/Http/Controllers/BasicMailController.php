<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use App\Jobs\UserMailerJob;
use App\Mail\SomeMailable;
use \App\Mail\CheckWithMailer;
use App\Models\EmailService;
class BasicMailController extends Controller
{
//   MAIL_MAILER=smtp
// MAIL_HOST=smtp.gmail.com
// MAIL_PORT=465
// MAIL_USERNAME=laravel.antopolis@gmail.com
// MAIL_PASSWORD=antopolis2222
// MAIL_ENCRYPTION=ssl
// MAIL_FROM_ADDRESS=antopolis@no-reply.com
// MAIL_FROM_NAME="${APP_NAME}"
    //
    // laravel.antopolis@gmail.com
    // antopolis2222
  // joyytbzncxzenhaz
    public function basic_email() {
      $data = array('name'=>"Nahid Hasan Limon 2");
   
      Mail::send(
        ['text'=>'basicMail'], 
        $data, 
        function($message) {
         $message->to('drimik2010@gmail.com', 'Limon Learning')->subject
            ('Laravel Basic Testing Mail');
         $message->from('nh.limon2010@gmail.com','Nahid Hasan Limon 22');
      }
    );
      echo "Basic Email Sent. Check your inbox.";
   }
   public function html_email() {
      $data = array('name'=>"Nahid Hasan Limon");
      Mail::send('basicMail', $data, function($message) {
         $message->to('tech.antopolis@gmail.com', 'Limon Learning')->subject
            ('Laravel HTML Testing Mail');
         $message->from('laravel.antopolis@gmail.com','Nahid Hasan Limon');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   public function attachment_email() {
      $data = array('name'=>"Nahid Hasan Limon");
      Mail::send('mail', $data, function($message) {
         $message->to('abc@gmail.com', 'Limon Learning')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('xyz@gmail.com','Nahid Hasan Limon');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }
   // check with  make mailer
   public function check_with_mailer(Request $request)
    {

        $details = [
            'to' => 'tech.antopolis@gmail.com',
            'from' => 'laravel.antopolis@gmail.com',
            'subject' => 'check mailer subject',
            'title' => 'check mailer title',
            "body"  => 'check mailer body'
        ];

        Mail::to('tech.antopolis@gmail.com')->send(new CheckWithMailer($details));

        if (Mail::failures()) {
            return response()->json([
                'status'  => false,
                'data'    => $details,
                'message' => 'Nnot sending mail.. retry again...'
            ]);
        }
        return response()->json([
            'status'  => true,
            'data'    => $details,
            'message' => 'Your details mailed successfully'
        ]);
    }
    public function check_dynamic_mailer(){
      $email_services= EmailService::get()->first();
      // dd($email_services);

      if ($email_services) {
        $configuration = [
         'smtp_host'    =>    $email_services->host,
         'smtp_port'    =>    $email_services->port,
         'smtp_username'  =>  $email_services->username,
         'smtp_password'  =>  $email_services->password,
         'smtp_encryption' => $email_services->encryption,
         'from_email'    => 'laravel.antopolis@gmail.com',
         'from_name'    => 'FROM-NAME-HERE',
        ];
      }
      // dd($configuration);
      // $configuration = [
      //    'smtp_host'    => 'smtp.gmail.com',
      //    'smtp_port'    => '465',
      //    'smtp_username'  => 'laravel.antopolis@gmail.com',
      //    'smtp_password'  => 'antopolis2222',
      //    'smtp_encryption'  => 'ssl',
      //    'from_email'    => 'laravel.antopolis@gmail.com',
      //    'from_name'    => 'FROM-NAME-HERE',
      //   ];

       // dd($configuration);
        // dd(new CheckWithMailer($limo="ok"));

        // $mailer = app()->makeWith('user.mailer', $configuration);
        // $mailer->to($this->to)->send($this->mailable);
        UserMailerJob::dispatch($configuration, 'drimik2010@gmail.com', new SomeMailable());
        // dispatch(new UserMailerJob($configuration,'nh.limon2010@gmail.com',new SomeMailable() ) );
    }
}

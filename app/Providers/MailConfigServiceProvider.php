<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\EmailService;
use App\Models\User;
// use App\Providers\Config;
use Illuminate\Support\Facades\Config;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
         // $emailServices = EmailService::where(['active' => 1])->latest()->first();
         $emailServices = User::get();
         // dd($emailServices);

        if ($emailServices) {
            $config = array(
                'mailer'     => 'smtp',
                'host'       => 'smtp.gmail.com',
                'port'       => '465',
                'username'   => 'laravel.antopolis@gmail.com',
                'password'   => 'antopolis2222',
                'encryption' => 'tls',
                'from'       => array('address' => 'codingdriver15@gmail.com', 'name' => 'limon'),
                
            );
            // dd($config);
            Config::set('mail', $config);
        }
    }
}

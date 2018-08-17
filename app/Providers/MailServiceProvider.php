<?php
namespace App\Providers;

use Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (\Schema::hasTable('sendmail_setting') && \Schema::hasTable('sendmail_driver')) {
            $settings = DB::table('sendmail_setting')->first();
            $driver = DB::table('sendmail_driver')->where('driver',$settings->driver)->first();
            $connection = json_decode($driver->configs);

            if ($driver) //checking if table is not empty
            {
                $config = array(
                    'driver'     => strtolower($settings->driver),
                    'host'       => $connection->host,
                    'port'       => $connection->port,
                    'from'       => array('address' => $settings->from_email, 'name' => $settings->from_name),
                    'encryption' => $connection->encryption,
                    'username'   => $connection->username,
                    'password'   => $connection->password,
                    'sendmail'   => $connection->sendmail,
                    'pretend' => false,
                );
                Config::set('mail', $config);
            }
        }

    }
}
<?php
namespace App\Customs;

use Illuminate\Mail\TransportManager;
use App\Modules\Sendmail\Models\Sendmail;
use App\Modules\Sendmail\Models\Sendmaildriver;

class CustomTransportManager extends TransportManager {


    public function __construct($app)
    {
        $this->app = $app;
        $settings = Sendmail::first();
        $driver = Sendmaildriver::where('driver',$settings->driver)->first();
        $connection = json_decode($driver->configs);

        if( $driver){

            $this->app['config']['mail'] = [
                'driver'        => strtolower($settings->driver),
                'host'          => $connection->host,
                'port'          => $connection->port,
                'from'          => [
                    'address'   => $settings->from_email,
                    'name'      => $settings->from_name
                ],
                'encryption'    => $connection->encryption,
                'username'      => $connection->username,
                'password'      => $connection->password,
                'sendmail'      => $connection->sendmail,
                'pretend'       => false
            ];
        }


    }
}
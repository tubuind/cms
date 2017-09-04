<?php

namespace App\Common\Helper;

class Youtube{


    private static $client = null;
    private static $youtube = null;

    public static function getClient()
    {
        if (self::$client == null)
        {
            $OAUTH2_CLIENT_ID = config('app.youtube_api')['oauth2_client_id'];
            $OAUTH2_CLIENT_SECRET = config('app.youtube_api')['oauth2_client_secret'];
            $_client = new \Google_Client();
            $_client->setClientId($OAUTH2_CLIENT_ID);
            $_client->setClientSecret($OAUTH2_CLIENT_SECRET);

            /*
             * This OAuth 2.0 access scope allows for full read/write access to the
             * authenticated user's account.
             */
            $_client->setScopes('https://www.googleapis.com/auth/youtube');
            $redirect = config('app.url').'/admin';
            $_client->setRedirectUri($redirect);
            self::$client = $_client;
        }
        return self::$client;
    }

    public static function getYotubeService(){
        $client = self::getClient();
        if(self::$youtube == null){
            return new \Google_Service_YouTube($client);
        }
        return self::$youtube;
    }
}

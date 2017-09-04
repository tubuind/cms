<?php

namespace App\Http\Controllers\Admin;

use App\Common\Helper\Youtube;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     * param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $youtube = Youtube::getYotubeService();

            // Call the channels.list method to retrieve information about the
            // currently authenticated user's channel.
            $channelsResponse = $youtube->channels->listChannels('contentDetails', array(
                'mine' => 'true',
            ));

            $htmlBody = '';
            foreach ($channelsResponse['items'] as $channel) {
                dd($channel);
            }
    }
}

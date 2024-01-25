<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function callApi()
    {
        $apiUrl = 'https://timesofindia.indiatimes.com/rssfeeds/-2128838597.cms?feedtype=json';

        $response = Http::get($apiUrl);

        $data = json_decode($response->body());
        echo "<pre>";
        $data = $data->channel->item;
        $array = [];
        foreach($data as $d)
        {
            $array[] = json_decode(json_encode($d), true);
        }
        DB::table('news')->truncate();      
        foreach ($array as $a)
        {

            $newsData = News::updateOrCreate(
                [
                    'title' => $a['title'],
                    'description' => $a['description'],
                    'link' => $a['link'],
                    'guid' => $a['guid'],
                    'publish_date' => $a['pubDate'],
                    'enclosure' => $a['enclosure']['@url'],
                    'creator' => array_key_exists('dc:creator', $a) ? $a["dc:creator"]['#text'] : null,
                ]
            );
                
        }
        return response()->redirectTo('showData');        
    }
    public function showData()
    {
        $this->callApi();
        return view('showData', ['data' => News::all()]);
    }
}

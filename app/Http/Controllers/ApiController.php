<?php

namespace App\Http\Controllers;

use App\Models\newsData;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ApiController extends Controller
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
        // dd($array);
        DB::table('news_Data')->truncate();      
        foreach ($array as $a)
        {
            
            if (array_key_exists('dc:creator', $a)) {
                $newsData = newsData::create([
                    'title' => $a['title'],
                    'description' => $a['description'],
                    'link' => $a['link'],
                    'guid' => $a['guid'],
                    'publish_date' => $a['pubDate'],
                    'creator' => $a["dc:creator"]['#text'],
                    'enclosure' => $a['enclosure']['@url'],
                ]);
            }
            else{
                $newsData = newsData::updateorcreate([
                    'title' => $a['title'], 
                    'description' => $a['description'], 
                    'link' => $a['link'],
                    'guid' => $a['guid'],
                    'publish_date' => $a['pubDate'],
                    'enclosure' => $a['enclosure']['@url'],
                ]);
            }
                
        }
        return response()->redirectTo('showData');        
    }
    public function showData()
    {
        return view('showData', ['data' => newsData::all()]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Shapito;
use DB;
use Illuminate\Http\Request;
use App\News;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function News()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://meduza.io/api/v3/search?chrono=news&page=0&per_page=100&locale=ru",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);


        curl_close($curl);
        $response = json_decode($response, true);
        foreach ($response['documents'] as $key => $value)
        {
            $news = new News();
            $news->url = $value['url'];
            $news->title = $value['title'];
            $news->type = stristr($value['url'], '/', true);
            if($value['prefs']['outer']['elements']['image']['show'])
                $news->image = "https://meduza.io/" . $value['prefs']['outer']['elements']['image']['small_url'];
            else
                $news->image = "https://meduza.io/image/attachments/images/003/935/641/original/Ucq_nz3NCVLkgWbreTRoog.png";
            if(DB::select('SELECT TITLE FROM NEWS WHERE TITLE = ?', array($news->title)) != null)
            {
                return view('news', ['data' => News::all()]);
            }
            $news->save();
        }
        return view('news', ['data' => News::all()]);
    }
    public function Articles()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://meduza.io/api/v3/search?chrono=articles&page=0&per_page=100&locale=ru",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);


        curl_close($curl);
        $response = json_decode($response, true);
        foreach ($response['documents'] as $key => $value)
        {
            $article = new Articles();
            $article->url = $value['url'];
            $article->title = $value['title'];
            $article->type = stristr($value['url'], '/', true);
            if($value['prefs']['outer']['elements']['image']['show'])
                $article->image = "https://meduza.io/" . $value['prefs']['outer']['elements']['image']['small_url'];
            else
                $article->image = "https://meduza.io/image/attachments/images/003/935/641/original/Ucq_nz3NCVLkgWbreTRoog.png";
            if(DB::select('SELECT TITLE FROM ARTICLES WHERE TITLE = ?', array($article->title)) != null)
            {
                return view('articles', ['data' => Articles::all()]);
            }
            $article->save();
        }
        return view('articles', ['data' => Articles::all()]);
    }
    public function Shapito()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://meduza.io/api/v3/search?chrono=shapito&page=0&per_page=100&locale=ru",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);


        curl_close($curl);
        $response = json_decode($response, true);
        foreach ($response['documents'] as $key => $value)
        {
            $shapito = new Shapito();
            $shapito->url = $value['url'];
            $shapito->title = $value['title'];
            $shapito->type = stristr($value['url'], '/', true);
            if($value['prefs']['outer']['elements']['image']['show'])
                $shapito->image = "https://meduza.io/" . $value['prefs']['outer']['elements']['image']['small_url'];
            else
                $shapito->image = "https://meduza.io/image/attachments/images/003/935/641/original/Ucq_nz3NCVLkgWbreTRoog.png";
            if(DB::select('SELECT TITLE FROM SHAPITOS WHERE TITLE = ?', array($shapito->title)) != null)
            {
                return view('shapito', ['data' => Shapito::all()]);
            }
            $shapito->save();
        }
        return view('shapito', ['data' => Shapito::all()]);
    }
    public function ReadNews($id)
    {
        $url = DB::table('News')->where('id', $id)->first()->url;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://meduza.io/api/v3/$url",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);


        curl_close($curl);
        $response = json_decode($response, true);
        return view('read', ['act' => $response['root']['content']['body']]);
    }
    public function ReadArticles($id)
    {
        $url = DB::table('Articles')->where('id', $id)->first()->url;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://meduza.io/api/v3/$url",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);


        curl_close($curl);
        $response = json_decode($response, true);
        return view('read', ['act' => $response['root']['content']['body']]);
    }
    public function ReadShapito($id)
    {
        $url = DB::table('Shapitos')->where('id', $id)->first()->url;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://meduza.io/api/v3/$url",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);


        curl_close($curl);
        $response = json_decode($response, true);
        return view('read', ['act' => $response['root']['content']['body']]);
    }
}

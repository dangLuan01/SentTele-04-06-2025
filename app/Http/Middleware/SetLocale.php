<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Str;
use Symfony\Component\HttpFoundation\Response;
class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = env('IP_TOKEN');
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        $country = Http::get('https://ipinfo.io/'.$ipaddress.'/json?token=' . $token)->json(); 
        isset($country['country']) ? $country['country'] : $country['country']='en';
        // if ($country['country'] == 'VN') {
        //     return redirect('https://facebook.com/');
        // }
        App::setLocale(Str::lower($country['country']));
        return $next($request);
        
    }
}

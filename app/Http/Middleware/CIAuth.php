<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;
class CIAuth
{
    private $curl_url;
    private $login_url;
    private $ci_enc_key;

    public function __construct()
    {
        $this->curl_url = env('CI_LMS_CURL','https://eng.asu.edu.eg/lms/login/get_curl');
        $this->login_url = env('CI_LMS_LOGIN','https://eng.asu.edu.eg/lms/login/');
        $this->ci_enc_key = env('CI_ENC_KEY','TESTKEY');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            return $next($request);
        }

        //get CI cookie
        $ci_session = $request->cookie('ci_session');   //get codeigniter cookie-session

        // redirect if ci_cookie not exist
        if(!isset($ci_session) || empty($ci_session))
            return $this->redToLogin();

        // pull info from ci_cookie
        $ci_session = $this->_unserialize($ci_session);

        // if info not correct
        if ( ! is_array($ci_session) OR ! isset($ci_session['session_id']) OR ! isset($ci_session['ip_address']) OR ! isset($ci_session['user_agent']) )
            return $this->redToLogin();

        // check from ASU site
        $curl = $this->my_curl($ci_session);    //check ASU site
        $headers = $curl['headers'];
        $res = $curl['res'];
        $status = $curl['status'];
        // redirect if not logged in ASU or error
        if($status==500 || $res==FALSE){
            return $this->redToLogin();
        }

        //check user on eps system and login
        if(isset($res[0]) && !empty($res[0])){
            if (!Auth::attempt(['user_id' => $res[0],'active' => 1])) {
                return $this->redToLogin('/dashboard');
            }
        }

        //update CI session cookie
        $ch_cookie = $request->cookie('ci_session');
        if(isset($ch_cookie) && !empty($ch_cookie)){
            $response = $next($request);
            $response->cookie('ci_session', $this->_set_cookie($ch_cookie));
            return $response;
        }

        return $next($request);
    }



    private function my_curl($ci_session){
        $url = $this->curl_url;

        $params = array(
            'session_id' => $ci_session['session_id'],
            'ip_address' => $ci_session['ip_address'],
            'user_agent' => $ci_session['user_agent'],
        );
        $fields = http_build_query($params);
        $headers = [];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch,CURLOPT_USERAGENT,'curl/eps');
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
        // this function is called by curl for each header received
        curl_setopt($ch, CURLOPT_HEADERFUNCTION,
            function($curl, $header) use (&$headers)
            {
                $len = strlen($header);
                $header = explode(':', $header, 2);
                if (count($header) < 2) // ignore invalid headers
                    return $len;

                $name = strtolower(trim($header[0]));
                if (!array_key_exists($name, $headers))
                    $headers[$name] = [trim($header[1])];
                else
                    $headers[$name][] = trim($header[1]);

                return $len;
            }
        );
        $output = curl_exec ($ch);
        $info = curl_getinfo($ch);
        $http_result = $info ['http_code'];
        $header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($output, 0, $header_len);
        $body = substr($output, $header_len);
        curl_close ($ch);
        if(isset($headers['userid']))
            $userid = $headers['userid'];
        else
            $userid = FALSE;
        return array(
            'res'=>$userid,
            'status'=>$http_result,
            'headers'=>$headers,
        );
    }

    private function redToLogin($url=null)
    {
        if(!isset($url) || empty($url))
            $url = $this->login_url;
        return redirect($url);
    }

    //helper functions
    /**************************************/
    function _serialize($data)
    {
        if (is_array($data))
        {
            foreach ($data as $key => $val)
            {
                if (is_string($val))
                {
                    $data[$key] = str_replace('\\', '{{slash}}', $val);
                }
            }
        }
        else
        {
            if (is_string($data))
            {
                $data = str_replace('\\', '{{slash}}', $data);
            }
        }

        return serialize($data);
    }
    function _unserialize($data)
    {
        $data = @unserialize($this->strip_slashes($data));

        if (is_array($data)) {
            foreach ($data as $key => $val) {
                if (is_string($val)) {
                    $data[$key] = str_replace('{{slash}}', '\\', $val);
                }
            }

            return $data;
        }

        return (is_string($data)) ? str_replace('{{slash}}', '\\', $data) : $data;
    }
    function strip_slashes($str)
    {
        if (is_array($str)) {
            foreach ($str as $key => $val) {
                $str[$key] = strip_slashes($val);
            }
        } else {
            $str = stripslashes($str);
        }

        return $str;
    }
    function getStringBetween($str,$from="=",$to=";")
    {
        $sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
        return substr($sub,0,strpos($sub,$to));
    }
    function _set_cookie($cookie)
    {
        $key = $this->ci_enc_key;
        //extract from cookie
        $ch_cookie = $this->_unserialize($cookie);
        //update last_activity
        $ch_cookie['last_activity'] = time();
        // Serialize the userdata for the cookie
        $cookie_data = $this->_serialize($ch_cookie);
        // if encryption is not used, we provide an md5 hash to prevent userside tampering
        //this key from code_igniter config
        $cookie_data = $cookie_data.md5($cookie_data.$key);
        return $cookie_data;
    }

    /**************************************/

}

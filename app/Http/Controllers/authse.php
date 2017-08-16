<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class authse extends Controller
{
    //
    public function test(Request $req , Response $resp){
        $verbose = fopen('php://temp', 'w+');
        $ses_id = $req->cookie('eps');
        $seso_id = $req->cookie('ci_session');
        $enc = rawurlencode($seso_id);
        print_r(($seso_id));print_r('<br><br>');
        print_r(rawurlencode($seso_id));
        //return;
        $url = 'http://127.0.0.1/cheptest/Login/get_curl';
        $params = array('ses_id'=>$ses_id);
        $useragent = $this->_unserialize($seso_id)['user_agent'];print_r('<br><br>'.$useragent);
          $ch = curl_init();
          $headers = [];
          curl_setopt($ch, CURLOPT_URL,$url);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_COOKIE, 'ci_session'.'='.$enc);
          curl_setopt($ch,CURLOPT_USERAGENT,$useragent);
          curl_setopt($ch, CURLOPT_HEADER, 1);
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
          curl_setopt($ch, CURLOPT_VERBOSE, true);
          curl_setopt($ch, CURLOPT_STDERR, $verbose);
          $output = curl_exec ($ch);
          $info = curl_getinfo($ch);
          $http_result = $info ['http_code'];
          curl_close ($ch);
          rewind($verbose);
          $verboseLog = stream_get_contents($verbose);
          print_r('<pre>');
          print_r($http_result);
          print_r($output);
          echo ":\nVerbose information:\n<pre>", htmlspecialchars($verboseLog), "</pre>\n";
          print_r('</pre>');
          // get cookie
// multi-cookie variant contributed by @Combuster in comments

preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $output, $matches);
$cookies = array();
foreach($matches[1] as $item) {
    parse_str($item, $cookie);
    $cookies = array_merge($cookies, $cookie);
}
echo '<br>';echo '<br>';var_dump($cookies);echo '<br>';echo '<br>';
$from = "=";
$to = ";";

//echo $this->getStringBetween($cookies,$from,$to);


          //print_r($headers['set-cookie']);
          if(isset($headers['set-cookie']) && !empty($headers['set-cookie']))
            $setcok = $headers['set-cookie'];

          if(isset($setcok) && !empty($setcok)){
              foreach($setcok as $ck){
                //echo '<br><br><br>'.$this->getStringBetween($ck,$from,$to);
                  $resp->cookie('ci_session', $this->getStringBetween($ck,$from,$to));
              }
          }
          return $resp;


}

function getStringBetween($str,$from,$to)
{
    $sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
    return substr($sub,0,strpos($sub,$to));
}


function _unserialize($data)
{
    $data = @unserialize(strip_slashes($data));

    if (is_array($data))
    {
        foreach ($data as $key => $val)
        {
            if (is_string($val))
            {
                $data[$key] = str_replace('{{slash}}', '\\', $val);
            }
        }

        return $data;
    }

    return (is_string($data)) ? str_replace('{{slash}}', '\\', $data) : $data;
}


}

if ( ! function_exists('strip_slashes'))
{
	function strip_slashes($str)
	{
		if (is_array($str))
		{
			foreach ($str as $key => $val)
			{
				$str[$key] = strip_slashes($val);
			}
		}
		else
		{
			$str = stripslashes($str);
		}

		return $str;
	}
}
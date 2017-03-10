<?php
class Flickr{ 
	
	private $apiKey; 
	
	public function __construct($apikey = null) {
		$this->apiKey = $apikey;
	} 
	
	public function search($query = null, $user_id = null, $per_page = 50, $format = 'rest') { 
		$args = array(
			'method' => 'flickr.photos.search',
			'api_key' => $this->apiKey,
			'tags' => 'sunset',
			'per_page' => 20,
			'format' => 'rest'
		);
		$url = 'http://flickr.com/services/rest/?'; 
		$search = $url.http_build_query($args);
		$result = $this->file_get_contents_curl($search); 
		if ($format == 'rest') $result = unserialize($result); 
		return $search;
	} 
	
	private function file_get_contents_curl($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36');
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$data = curl_exec($ch);
		$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		if ($retcode == 200) {
			return $data;
		} else {
			return null;
		}
	}	
}
require_once('flickr.php'); 
$Flickr = new Flickr('b325aa1d4de2744dca2c8657fb37170b'); 
$data = $Flickr->search('sunset');
$rsp = simplexml_load_file($data);
foreach($rsp->photos->photo as $photo)
{
	echo '<img src="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg">'; 
}
?>


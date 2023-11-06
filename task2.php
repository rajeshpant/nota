<?php
require_once('config.php');
$url = 'https://www.wikipedia.org/';
$contents = file_get_contents($url);
preg_match_all('/<div class="other-project">(.*?)<\/a>/si', $contents, $results);
//picture in background & use same image all picture
if(!empty($results[1])){
	foreach($results[0] as $key => $result){ 
		$title = $abstract = $url  = '';
		preg_match('/href="(.*?)"/is', $result, $link_result);
		$url =  $link_result[1] ?? '';
		preg_match('/<div class="other-project-text">(.*?)<\/div>/si', $result, $content_result);
		if(!empty($content_result[1])){
			$txt_arr = explode('</span>', $content_result[1]);
			$title = strip_tags($txt_arr[0]);
			$abstract = strip_tags($txt_arr[1]);
		}
		if(check_url_abstract($url, $abstract, $conn)){
			save_data($title, $url, $abstract, $conn);
		}
	}
}
/**

 * save_data is used to save data in wiki_section table

 * @param string $title title of wiki content

 * @param string $url value of the content url

 * @param string $abstract value of the content tag line

 * @return integer 

 */
function save_data($title, $url, $abstract, $conn){
	$stmt = $conn->prepare('INSERT INTO wiki_sections (title, url, abstract) VALUES (?, ?, ?)');
	$stmt->bind_param("sss", $title, $url, $abstract);
	$stmt->execute();
	return $conn->insert_id;
}
/**

 * check_url_abstract check url & abstract exist or not in table

 * @param string $url value of the content url

 * @param string $abstract value of the content tag line

 * @return integer 

 */
function check_url_abstract($url, $abstract, $conn){
	$stmt = $conn->prepare('SELECT id FROM wiki_sections WHERE url = ? OR abstract = ? ');
	$stmt->bind_param("ss", $url , $abstract);
	$stmt->execute();
	$stmt->store_result();
	return ($stmt->num_rows === 0) ? true : false;
}

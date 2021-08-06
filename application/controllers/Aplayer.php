<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplayer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Views_model', 'view');
	}

	public function index()
	{
		$content['header'] = $this->view->get_header_metas('home');
		$content['href'] = '#';
		$content['links'] = array();
		$content['folders'] = array();
		
		if($this->input->get()) {
			$htmlinput = file_get_contents($this->input->get('url'));
			$doc = new \DOMDocument();
			$doc->loadHTML($htmlinput);

			$links = [];
			$folders = [];

			// all links in document
			$arr = $doc->getElementsByTagName("a"); // DOMNodeList Object
			foreach($arr as $item) { // DOMElement Object
				$href =  $item->getAttribute("href");
				//$text = trim(preg_replace("/[\r\n]+/", " ", $item->nodeValue));
				if(stripos($href, ".mp3")) {
					$links[] = [
					  'href' => $href,
					  'text' => utf8_encode(urldecode($href))
					];
				}
				else if( ! stripos($href, "?") && stripos($href, "/") == strlen($href)-1 ) {
					$folders[] = [
					  'href' => $href,
					  'text' => utf8_encode(urldecode($href))
					];
				}
			}
			$content['url'] = $this->input->get('url');
			$content['links'] = $links;
			$content['folders'] = $folders;
		}
		$this->load->view('header', $content);
		$this->load->view('play');
		$this->load->view('footer');
	}

}

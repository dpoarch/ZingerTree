<?php
require_once('../vendor/autoload.php');
require_once("GetTree.php");


use Zingtree\BeCodingChallenge\GetTree;
use GuzzleHttp\Client;


class Views extends GetTree {

	private $BASE_URI = 'https://zingtree.com/api/json.php?tree_node=2';

	public function __construct(){
		//Reinitiate client request url
		$this->client = new Client(
            [
                'base_uri' => $this->BASE_URI,
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ]
        );
	}
}

$LoadTree = new GetTree();


$nodeCount = $LoadTree->getNodeCount();



$getNode = $LoadTree->getNode(1);



$getRootNode = $LoadTree->getRootNode();



$deleteNode = $LoadTree->deleteNode(1);


?>


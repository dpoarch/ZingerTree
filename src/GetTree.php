<?php
namespace Zingtree\BeCodingChallenge;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;


class GetTree 
{	
	/**
     * @var ClientInterface	
 	*/
	private $client;

	private $client_params = '?tree_id=TREE_ID';

	private $client_response;

	public $client_status_code;


	public $tree_title;
	public $tree_description;
	public $tree_id;
	public $root_node_id;

	public $result;

	/**
     * Constructor
     *
     * @param ClientInterface $client
     */
	public function __construct() {
        $this->client = new Client(
            [
                'base_uri' => 'https://zingtree.com/api/json.php',
                'headers' => [
                    'Content-Type' => 'application/json'
                ]
            ]
        );

        $this->client_response = $this->client->get(
	    	$this->client_params
	    );

	    $this->client_status_code = $this->client_response->getStatusCode();

        $response = json_decode(
        	$this->client_response->getBody(), 
        	true
        );

        $this->tree_title = !empty($response['title']) ? $response['title'] : $response['name'];
        $this->tree_description = $response['description'];
        $this->tree_id = $response['tree_id'];
        $this->root_node_id = $response['root_node_id'];
    }


    public function getNodeCount() {
	    $statusCode = $this->client_status_code;

	    $jsonArray = json_decode(
	    	$this->client_response->getBody(), 
	    	true
	    );

	    $this->result = count(
	    	$jsonArray['nodes']
	    );

	    return $this->result;
	}


	public function getNode(int $id) {
	    $statusCode = $this->client_status_code;
	    $jsonArray = json_decode(
	    	$this->client_response->getBody(), 
	    	true
	    );

	    $this->result = [];

	    foreach($jsonArray['nodes'] as $node)
	    {
	    	if(intval($node['project_node_id']) === $id)
	    	{
	    		$this->result[] = $node;
	    	}
	    }

	    return $this->result;
	}

	public function getRootNode() {


	    $statusCode = $this->client_response->getStatusCode();

	    $jsonArray = json_decode(
	    	$this->client_response->getBody(),
	    	true
	    );

	    $rootNodeId = $jsonArray["root_node_id"];

	    foreach($jsonArray['nodes'] as $node)
	    {
	    	if(intval($node['project_node_id']) == $rootNodeId)
	    	{
	    		$this->result[] = $node;
	    	}
	    }


	    return $this->result;
	}


	public function deleteNode(int $nodeId){
		try
		{
		$response = $this->client->delete('?nodeId={nodeId}', 
			array(
				'nodeId'=> $nodeId
			)
		);

		$statusCode = $response->getStatusCode();
		if($statusCode == 200){
			$this->result = true;
		}

		}catch(\Exception $exception){
			// dump($exception);
			$this->result = false;
		}
		
		return $this->result;
	}

}

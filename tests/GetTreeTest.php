<?php 
use Zingtree\BeCodingChallenge\GetTree;
use PHPUnit\Framework\TestCase;


final class GetTreeTest extends TestCase
{
    private $client;

    public function testInitialize()
    {
        
        $GetTree = new GetTree();


        $this->assertThat(strlen($GetTree->tree_title), $this->logicalAnd(
            $this->greaterThan(0)
        ));

        $this->assertThat(strlen($GetTree->tree_description), $this->logicalAnd(
            $this->greaterThan(0)
        ));

        $this->assertThat(strlen($GetTree->tree_id), $this->logicalAnd(
            $this->isType('int'), 
            $this->greaterThan(0)
        ));

         $this->assertThat(strlen($GetTree->root_node_id), $this->logicalAnd(
            $this->isType('int'), 
            $this->greaterThan(0)
        ));

        $this->assertEquals(200, $GetTree->client_status_code, "Assert that Initialization is Code 200");
    }


    public function testGetNodeCount()
    {
        $GetTree = new GetTree();

         $this->assertInternalType("int", $GetTree->getNodeCount());

        $this->assertThat($GetTree->getNodeCount(), $this->logicalAnd(
            $this->isType('int'), 
            $this->greaterThan(0)
        ), "Assert function GetNodeCount() that count is int type");
    }

    public function testGetNode() {
        $GetTree = new GetTree();

        $this->assertIsArray($GetTree->getNode(1), "Assert function getNode(int id) is Array or Not");
    }


    // public function testDeleteNode() {
    //     $GetTree = new GetTree();

    //     $this->assertIsBool($GetTree->deleteNode(1), "Assert function deleteNode() returns a boolean true/false");
    // }


     public function testGetRootNode() {
        $GetTree = new GetTree();

        $this->assertIsArray($GetTree->getRootNode(), "Assert function getRootNode() is Array or Not");
    }

        
}
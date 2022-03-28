# Zingtree Coding Challenge

## Getting Started

1. Setup phpunit/guzzle run `composer install` on CLI
2. Run Test cases just simply run `phpunit tests`
3. To test public method/instances just run `php src/Views.php`

Note: Updated composer packages to the latest version.


## Create a Tree parsing class

The class need to load the JSON representation of a tree from our API at: 
https://zingtree.com/api/json.php?tree_id=TREE_ID

The TREE_ID will be provided at the time of construction of the class instance.

_Please note that `composer` is required to set up phpunit._

---

### Class Implementation

After the class is initialized, there should be the ability to expose the following tree data from the loaded JSON:
- Tree Title
- Tree Description
- Tree ID
- Root Node ID

Additionally, the following public methods should be avaiable for accessing and modifying nodes:

`int getNodeCount()`

Returns the current number of nodes in the tree.

`array getNodes()`

Returns an array of all nodes from the tree.

`array getNode(int nodeId)`

Returns the specific node requested from the tree.

`array getRootNode()`

Returns the root node of the tree.

`boolean deleteNode(int $nodeId)`

Deletes the node specified.

---
### Tests
Write a test that covers at least one method in the class. Tests can be written assuming phpunit is available and configured:

    ./vendor/bin/phpunit tests

---
## Final Output

A final version of this should be able to create an instance of this class and then run each public method.




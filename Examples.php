<?php 

require_once __DIR__ . '/vendor/autoload.php';

// use Code\Lists\LinkedList;
// use Code\Lists\DoublyLinkedList;

// use Code\Stacks\StackArray;
// use Code\Stacks\StackLinkedList;

// use Code\Queues\QueueArray;
// use Code\Queues\QueueLinkedList;

use Code\Trees\BinarySearchTree;

$tree = new BinarySearchTree(10); 

$tree->insert(12); 
$tree->insert(6); 
$tree->insert(3); 
$tree->insert(8); 
$tree->insert(15); 
$tree->insert(13); 
$tree->insert(36); 

$tree->traverse($tree->root);

echo $tree->search(12) ? "Found" : "Not Found";


 
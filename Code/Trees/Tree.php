<?php

namespace Code\Trees;

class Tree
{ 

    /**
     * Binary tree
     *
     * @var Tree
     */
    public $root = null; 

    public function __construct(TreeNode $node)
    { 
      $this->root = $node; 
    } 

    public function traverse(TreeNode $node, int $level = 0)
    {
        if ($node) { 
            echo str_repeat("-", $level); 
            echo $node->data . "\n"; 

            foreach ($node->children as $childNode) { 
                $this->traverse($childNode, $level + 1); 
            } 
        } 
    } 

} 
<?php

namespace Code\Tree;

class TreeNode
{ 
    /**
     * Binary tree
     *
     * @var TreeNode
     */
    public $data = null; 

    /**
     * Tree leafs
     *
     * @var TreeNode
     */
    public $children = []; 

    public function __construct(string $data = null)
    { 
      $this->data = $data; 
    } 

    public function addChildren(TreeNode $node)
    { 
      $this->children[] = $node; 
    } 

} 
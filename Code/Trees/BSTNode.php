<?php

namespace Code\Trees;

class BSTNode
{ 

    /**
     * Binary tree
     *
     * @var BSTNode
     */
    public $data; 

    /**
     * Left leaf
     *
     * @var BSTNode
     */
    public $left; 

    /**
     * Right leaf
     *
     * @var BSTNode
     */
    public $right; 

    /**
     * Parent of the node
     *
     * @var BSTNode
     */
    public $parent;

    public function __construct(int $data = null, BSTNode $parent = null)
    { 
       $this->data = $data; 
       $this->parent = $parent; 
       $this->left = null; 
       $this->right = null; 
    } 

    public function min()
    { 
        $node = $this; 

        while($node->left) { 
            $node = $node->left; 
        } 
        
        return $node; 
    } 

    public function max()
    { 
        $node = $this; 

        while($node->right) { 
            $node = $node->right; 
        } 
        
        return $node; 
    } 

    public function successor()
    { 
        $node = $this; 

        if($node->right) 
           return $node->right->min(); 
        else 
            return null; 
    } 

    public function predecessor()
    { 
        $node = $this; 
        if($node->left) 
           return $node->left->max(); 
        else 
           return null;
    }

}

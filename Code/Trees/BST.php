<?php

namespace Code\Trees;

class BST
{ 
    /**
     * BST Root
     *
     * @var BSTNode
     */
    public $root = null; 

    public function __construct(int $data)
    { 
        $this->root = new BSTNode($data); 
    } 

    public function isEmpty(): bool
    { 
        return $this->root === null; 
    } 
 
    public function search(int $data)
    { 
        if ($this->isEmpty()) { 
            return false; 
        } 
      
        $node = $this->root; 
      
        while ($node) { 
            if ($data > $node->data) { 
                $node = $node->right; 
            } elseif ($data < $node->data) { 
                $node = $node->left; 
            } else { 
                break; 
            } 
        } 
      
        return $node; 
    }

    function insert(int $data)
    {
        if ($this->isEmpty()) {
            $node = new BSTNode($data);
            $this->root = $node;
            return $node;
        }

        $node = $this->root;

        while ($node) {
            if ($data > $node->data) {
                if ($node->right) {
                    $node = $node->right;
                }
                else {
                    $node->right = new BSTNode($data, $node);
                    $node = $node->right;
                    break;
                }
            }
            elseif ($data < $node->data) {
                if ($node->left) {
                    $node = $node->left;
                }
                else {
                    $node->left = new BSTNode($data, $node);
                    $node = $node->left;
                    break;
                }
            } else {
                break;
            }
        }

        return $node;
    }

    public function delete()
    { 
        $node = $this; 

        if (!$node->left && !$node->right) { 
            if ($node->parent->left === $node) { 
              $node->parent->left = null; 
            } else { 
              $node->parent->right = null; 
            } 
        } elseif ($node->left && $node->right) { 
            $successor = $node->successor(); 
            $node->data = $successor->data; 
            $successor->delete(); 
        } elseif ($node->left) { 
            if ($node->parent->left === $node) { 
                $node->parent->left = $node->left; 
                $node->left->parent = $node->parent->left; 
            } else { 
                $node->parent->right = $node->left; 
                $node->left->parent = $node->parent->right; 
            } 
            $node->left = null; 
        } elseif ($node->right) { 
            if ($node->parent->left === $node) { 
                $node->parent->left = $node->right; 
                $node->right->parent = $node->parent->left; 
            } else { 
                $node->parent->right = $node->right; 
                $node->right->parent = $node->parent->right; 
            } 
            $node->right = null; 
        }
    }

    public function remove(int $data) {
        $node = $this->search($data);
        if ($node) $node->delete();
    }

    public function traverse(BSTNode $node, string $type="in-order")
    {  
        switch($type) {        
            case "in-order": 
              $this->inOrder($node); 
            break; 
        
            case "pre-order": 
              $this->preOrder($node); 
            break; 
        
            case "post-order": 
              $this->postOrder($node); 
            break;       
        }      
    } 
        
        
    public function preOrder(BSTNode $node) { 
        if ($node) { 
            echo $node->data . " "; 
            if ($node->left) $this->traverse($node->left); 
            if ($node->right) $this->traverse($node->right); 
        }      
    } 
    
    public function inOrder(BSTNode $node) { 
        if ($node) {           
            if ($node->left) $this->traverse($node->left); 
            echo $node->data . " "; 
            if ($node->right) $this->traverse($node->right); 
        } 
    } 
    
    public function postOrder(BSTNode $node) { 
        if ($node) {           
            if ($node->left) $this->traverse($node->left); 
            if ($node->right) $this->traverse($node->right); 
            echo $node->data . " "; 
        } 
    } 

}

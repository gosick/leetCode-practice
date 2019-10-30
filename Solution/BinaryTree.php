<?php

namespace Solution;

use Solution\TreeNode;

class BinaryTree
{
    /**
     * TreeNode
     */
    public $root;

    /**
     * __construct
     *
     * @param  array|null $nodes
     *
     * @return void
     */
    public function __construct(array $nodes = null)
    {
        if ($nodes !== null) {
            $this->root = new TreeNode(array_shift($nodes));
            $this->buildTree($nodes);
        } else {
            $this->root = null;
        }
    }

    /**
     * buildTree
     *
     * @param  array $nodes
     *
     * @return void
     */
    public function buildTree(array $nodes)
    {
        $current = $this->root;
        $store = [];
        $defaultVal = null;

        while (true) {

            $value = array_shift($nodes);
            if ($value !== null) {
                $newNode = new TreeNode($value);
                $newNode->parent = $current;
                $current->left = $newNode;
                $store[] = $newNode;
            }

            if (empty($nodes)) {
                break;
            }

            $value = array_shift($nodes);
            if ($value !== null) {
                $newNode = new TreeNode($value);
                $newNode->parent = $current;
                $current->right = $newNode;
                $store[] = $newNode;
            }

            if (!empty($nodes)) {
                $current = $store[0];
                array_shift($store);
            } else {
                break;
            }
        }
    }

    /**
     * leftMost
     *
     * @param  TreeNode $current
     *
     * @return TreeNode|null
     */
    public function leftMost(TreeNode $current)
    {
        while ($current->left !== null) {
            $current = $current->left;
        }
        return $current;
    }

    /**
     * inOrderSuccessor
     *
     * @param  TreeNode $current
     *
     * @return TreeNode|null
     */
    public function inOrderSuccessor(TreeNode $current)
    {
        if ($current->right !== null) {
            return $this->leftMost($current->right);
        }

        $successor = $current->parent;
        while ($successor !== null && $current === $successor->right) {
            $current = $successor;
            $successor = $successor->parent;
        }
        return $successor;
    }

    /**
     * inOrderByParent
     *
     * @param  TreeNode $root
     *
     * @return TreeNode
     */
    public function inOrderByParent(TreeNode $root) : TreeNode
    {
        $current = $this->leftMost($root);
        $node = new TreeNode($current->val);
        while ($current) {
            $current = $this->inOrderSuccessor($current);
            if ($current === null) {
                break;
            } else {
                $node->right = new TreeNode($current->val);
                $node->right->parent = $node;
                $node = $node->right;
            }
        }
        
        return $node;
    }
}
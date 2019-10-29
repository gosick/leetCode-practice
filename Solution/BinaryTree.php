<?php

namespace Solution;

use Solution\TreeNode;

class BinaryTree
{
    /**
     * TreeNode
     */
    private $node;

    public $root;

    /**
     * __construct
     *
     * @param  array $nodes
     *
     * @return void
     */
    public function __construct(array $nodes)
    {
        $this->root = new TreeNode(array_shift($nodes));
        $this->buildTree($nodes);
        // $this->node = $this->buildTree($nodes);
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
                // $newNode->parent = $current;
                $current->left = $newNode;
                $store[] = $newNode;
            }

            if (empty($nodes)) {
                break;
            }

            $value = array_shift($nodes);
            if ($value !== null) {
                $newNode = new TreeNode($value);
                // $newNode->parent = $current;
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
}
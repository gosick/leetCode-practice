<?php

namespace Solution;

use Solution\TreeNode;

class BinaryTree
{
    /**
     * TreeNode
     */
    private $node;

    /**
     * __construct
     *
     * @param  array $nodes
     *
     * @return void
     */
    public function __construct(array $nodes)
    {
        $this->node = $this->buildTree($nodes);
    }

    /**
     * getTreeNode
     *
     * @return TreeNode
     */
    public function getTreeNode() : TreeNode
    {
        return $this->node;
    }

    /**
     * buildTree
     *
     * @param  array $nodes
     *
     * @return TreeNode
     */
    public function buildTree(array $nodes) : TreeNode
    {
        $tree = $this->treeCount($nodes);
        $temp = [];
        for ($i = 0; $i < $tree['depth']; $i++) {
            $temp[] = array_slice($nodes, $tree['count'][$i] - 1, $tree['count'][$i]);
        }

        $root = null;
        $currentNode = [];
        $result = null;
        for ($i = 0; $i < $tree['depth']; $i++) {
            if ($i === 0) {
                $root = new TreeNode($temp[0][$i]);
                $currentNode[] = $root;
            } else {

                foreach ($currentNode as &$item) {
                    if (!empty($temp[$i])) {
                        $nodeValue = array_shift($temp[$i]);
                        $item->left = (is_null($nodeValue)) ? null : new TreeNode($nodeValue);
                        $nodeValue = array_shift($temp[$i]);
                        $item->right = (is_null($nodeValue)) ? null : new TreeNode($nodeValue);
                    }
                }

                if ($i !== $tree['depth'] - 1) {
                    $currentNode = $this->getNodesByDepth($currentNode);
                }
            }

        }

        return $root;
    }

    /**
     * getNodesByDepth
     *
     * @param  array $nodes
     *
     * @return array
     */
    public function getNodesByDepth(array $nodes) : array
    {
        $result = [];

        for ($i = 0; $i < count($nodes); $i++) {
            $result[] = $nodes[$i]->left;
            $result[] = $nodes[$i]->right;
        }
        return $result;
    }

    /**
     * treeCount
     *
     * @param  array $list
     *
     * @return array
     */
    public function treeCount(array $list) : array
    {
        $total = count($list);
        $times = 0;
        $i = ($total % 2 === 0) ? 1 : 0;
        
        $tree = [
            'depth' => 0,
            'count' => []
        ];
        while ($total > 0) {
            $tree['count'][] = pow(2, $i);
            $total -= pow(2, $i);
            $tree['depth']++;
            $i++;
        }
        return $tree;
    }
}
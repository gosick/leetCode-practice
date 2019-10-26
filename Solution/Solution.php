<?php

namespace Solution;

use Solution\TreeNode;

class Solution
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * leetCode #1160
     * countCharacters
     *
     * @param  mixed $words
     * @param  mixed $chars
     *
     * @return int
     */
    public function countCharacters(array $words, string $chars) : int
    {

        $case = [];
        $fail = false;

        $store = str_split($chars);
        foreach (count_chars($chars, 1) as $key => $value) {
            $case[chr($key)] = $value;
        }

        $count = 0;
        foreach ($words as $key => $value) {
            $test = str_split($value);
            $cloneCase = $case;
            $temp = 0;

            for ($i = 0; $i < count($test); $i++) {

                if (array_key_exists($test[$i], $cloneCase)) {
                    if ($cloneCase[$test[$i]] > 0) {
                        $temp++;
                        $cloneCase[$test[$i]]--;
                    }
                }
            }

            if ($temp === count($test)) {
                $count += strlen($value); 
            }
        }

        return $count;
    }

    /**
     * leetCode #811
     * subdomainVisits
     *
     * @param mixed $cpdomains
     *
     * @return array
     */
    public function subdomainVisits(array $cpdomains) : array
    {
        $store = [];

        foreach ($cpdomains as $value) {
            
            $split = explode(' ', $value);
            $domainList = explode('.', $split[1]);
            $count = count($domainList) - 1;
            $domain = [];
            $temp = '';
            for ($i = $count; $i >= 0; $i--) {

                $temp = $domainList[$i] . '.' . $temp;
                if ($i === $count) {
                    $temp = $domainList[$i];
                }
                
                $domain[$temp] = (int) $split[0];
            }

            foreach ($domain as $key => $domainValue) {

                if (!array_key_exists($key, $store)) {
                    $store[$key] = $domainValue;
                } else {
                    $store[$key] += $domainValue;
                }
            }
        }

        $result = [];
        foreach ($store as $key => $value) {
            $result[] = $value . ' ' . $key;
        }

        return $result;
    }

    public function buildTree(array $nodes)
    {
        if (empty($nodes)) {
            return null;
        }

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

    public function getNodesByDepth(array $nodes)
    {
        $result = [];

        for ($i = 0; $i < count($nodes); $i++) {
            $result[] = $nodes[$i]->left;
            $result[] = $nodes[$i]->right;
        }
        return $result;
    }

    /**
     * leetCode #965
     * isUnivalTree
     *
     * @param  mixed $root
     *
     * @return bool
     */
    public function isUnivalTree(TreeNode $root) : bool
    {
        if ($root->left === null && $root->right === null) {
            return true;
        } elseif ($root->left === null && $root->right !== null) {
            return ($root->val === $root->right->val) && $this->isUnivalTree($root->right);
        } elseif ($root->left !== null && $root->right === null) {
            return ($root->val === $root->left->val) && $this->isUnivalTree($root->left);
        }

        if ($root->left->val !== $root->right->val) {
            return false;
        }

        return $this->isUnivalTree($root->left) && $this->isUnivalTree($root->right);
    }

    public function treeCount(array $list)
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
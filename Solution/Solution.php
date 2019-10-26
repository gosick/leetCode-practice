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

}
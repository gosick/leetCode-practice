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

    /**
     * leetCode #922
     * sortArrayByParityII
     *
     * @param  mixed $a
     *
     * @return array
     */
    public function sortArrayByParityII(array $a) : array
    {
        $result = [];
        $count = 0;
        $count2 = 1;
        foreach ($a as $value) {
            
            if ($value % 2 === 0) {
                $result[$count] = $value;
                $count += 2;
            } else {
                $result[$count2] = $value;
                $count2 += 2;
            }
        }

        ksort($result);
        return $result;
    }

    /**
     * leetCode #509
     * fib
     *
     * @param  int $n
     *
     * @return int
     */
    public function fib(int $n) : int
    {
        // method 1
        if ($n <= 1) {
            return $n;
        }
        return $this->fib($n - 1) + $this->fib($n - 2);

        // method 2
        // if ($n < 0) {
        //     return $n;
        // }
        // $temp = [];
        // array_push($temp, 0, 1);
        // for ($i = 2; $i <= $n; $i++) {
        //     $temp[$i] = $temp[$i - 1] + $temp[$i - 2];
        // }
        // return $temp[$n];
    }

    /**
     * leetCode #883
     * projectionArea
     *
     * @param  mixed $grid
     *
     * @return int
     */
    public function projectionArea(array $grid) : int
    {
        $rows = count($grid);
        $cols = $rows;
        $maxLength = $rows * $cols;
        for ($i = 0; $i < $rows; $i++) {
            $width = 0;
            $height = 0;
            for ($j = 0; $j < $cols; $j++) {
                if ($grid[$i][$j] === 0) {
                    $maxLength--;
                }
                $width = max($width, $grid[$j][$i]);
                $height = max($height, $grid[$i][$j]);
            }
            $result += $width + $height;
        }
        
        return $result + $maxLength;
    }

    /**
     * leetCode #1200
     * minimumAbsDifference
     *
     * @param  array $arr
     *
     * @return array
     */
    public function minimumAbsDifference(array $arr) : array
    {
        sort($arr);
        $length = count($arr);
        $result = [];
        $min = $arr[$length - 1] - $arr[0];

        foreach ($arr as $key => $value) {
            if ($key >= $length - 1) {
                break;
            }
            if ($arr[$key + 1] - $value < $min) {
                $min = $arr[$key + 1] - $value;
                $result = [];
                $result[] = [$value, $arr[$key + 1]];
            } elseif ($arr[$key + 1] - $value === $min) {
                $result[] = [$value, $arr[$key + 1]];
            }
        }
        return $result;
    }
}
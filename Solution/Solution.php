<?php

namespace Solution;

use Solution\TreeNode;
use Solution\Node;
use Solution\BinaryTree;
use Solution\ListNode;

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

    /**
     * leetCode #1122
     * relativeSortArray
     *
     * @param  array $arr1
     * @param  array $arr2
     *
     * @return array
     */
    public function relativeSortArray(array $arr1, array $arr2) : array
    {
        $length1 = count($arr1);
        $length2 = count($arr2);
        $temp = $arr2;

        for ($i = 0; $i < $length1; $i++) {

            if (!empty($temp)) {
                $key = array_search($arr1[$i], $temp);
                if ($key !== false) {
                    unset($temp[$key]);
                    unset($arr1[$i]);
                }  
            }
        }

        sort($arr1);
        foreach ($arr1 as $value) {
            $key = array_search($value, $arr2);
            if ($key !== false) {

                for ($i = $length2;; $i--) {

                    if ($i === $key + 1) {
                        $arr2[$i] = $value;
                        break;
                    } else {
                        $arr2[$i] = $arr2[$i - 1];
                    }
                }
                $length2++;
            } else {
                $arr2[] = $value;
                $length2++;
            }
        }

        return $arr2;
    }

    /**
     * leetCode #559
     * maxDepth
     *
     * @param  Node|null $root
     *
     * @return int
     */
    public function maxDepth(Node $root = null) : int
    {
        if ($root === null) {
            return 0;
        } elseif (empty($root->children)) {
            return 1;
        } else {
            $sum = 0;
            foreach ($root->children as $key => $value) {
                $depth = $this->maxDepth($value);
                $sum = max($depth, $sum);
            }
            return $sum + 1;
        }
    }

    /**
     * leetCode #897
     * increasingBST
     *
     * @param  TreeNode $root
     *
     * @return TreeNode
     */
    public function increasingBST(TreeNode $root) : TreeNode
    {
        $tree = new BinaryTree(null);
        return $tree->inOrderByParent($root);
    }

    /**
     * leetCode 1002
     * commonChars
     *
     * @param  array $A
     *
     * @return array
     */
    public function commonChars(array $A) : array
    {    
        $start = str_split($A[0]);
        for ($i = 1; $i < count($A); $i++) {

            $temp = str_split($A[$i]);
            $start = array_filter($start, function ($item) use (&$temp, $i) {
                $search =  array_search($item, $temp);

                if ($search !== false) {
                    $temp[$search] = '';
                    return true;
                } else {
                    return false;
                }
                return $search === false ? false : $temp[$search] = '';
            });
            
        }
        sort($start);
        return $start;
    }

    /**
     * leetCode #999
     * numRookCaptures
     *
     * @param  array $board
     *
     * @return int
     */
    public function numRookCaptures(array $board) : int
    {
        // R . B p uppercase represent white pieces and lowercase represent black pieces
        // R rook, B bishop, p pawns

        $findRookPosition = function ($board) {
            foreach ($board as $rowKey => $row) {
                $search = array_search('R', $row);
                if ($search !== false) {
                    return [
                        'x' => $rowKey,
                        'y' => $search
                    ];
                }
            }
        };

        $capture = 0;
        // to Rook top
        $moveUp = function ($board, $wRook) use (&$capture) {
            for ($i = $wRook['x'] - 1; $i >= 0; $i--) {
                $piece = $board[$i][$wRook['y']];
                if ($piece === '.') {
                    continue;
                } elseif ($piece === 'p') {
                    $capture++;
                }
                break;
            }
        };

        // to Rook down
        $moveDown = function ($board, $wRook) use (&$capture) {
            for ($i = $wRook['x'] + 1; $i <= 7; $i++) {
                $piece = $board[$i][$wRook['y']];
                if ($piece === '.') {
                    continue;
                } elseif ($piece === 'p') {
                    $capture++;
                }
                break;
            }
        };

        // to Rook left
        $moveLeft = function ($board, $wRook) use (&$capture) {
            for ($i = $wRook['y'] - 1; $i >= 0; $i--) {
                $piece = $board[$wRook['x']][$i];
                if ($piece === '.') {
                    continue;
                } elseif ($piece === 'p') {
                    $capture++;
                }
                break;
            }
        };

        // to Rook right
        $moveRight = function ($board, $wRook) use (&$capture) {
            for ($i = $wRook['y'] + 1; $i <= 7; $i++) {
                $piece = $board[$wRook['x']][$i];
                if ($piece === '.') {
                    continue;
                } elseif ($piece === 'p') {
                    $capture++;
                }
                break;
            }
        };

        $wRook = $findRookPosition($board);
        $moveUp($board, $wRook);
        $moveLeft($board, $wRook);
        $moveDown($board, $wRook);
        $moveRight($board, $wRook);

        return $capture;
    }

    /**
     * leetCode #1025
     * divisorGame
     *
     * @param  int $N
     *
     * @return bool
     */
    public function divisorGame(int $N) : bool
    {
        if ($N <= 1) {
            return false;
        }
        
        $move = 0;
        while ($N > 1) {
            for ($i = 1; $i < $N; $i++) {
                if ($N % $i === 0)  {
                    $N -= $i; 
                    $move += 1;
                    break;
                }
            }            
        }
        
        return ($move % 2 === 1) ? true : false;
    }

    /**
     * leetCode #1047
     * removeDuplicates
     *
     * @param  string $s
     *
     * @return string
     */
    public function removeDuplicates(string $s) : string
    {
        $end = -1;
        for ($i = 0; $i < strlen($s); $i++) {
            if (0 <= $end && $s[$end] === $s[$i]) {
                $end--;
            } else {
                $s[++$end] = $s[$i];
            }
        }
        return substr($s, 0, $end + 1);
    }

    /**
     * leetCode #908
     * smallestRangeI
     *
     * @param  array $A
     * @param  int $K
     *
     * @return int
     */
    public function smallestRangeI(array $A, int $K) : int
    {
        $maxA = max($A);
        $minA = min($A);
        $difference = $maxA - $minA;
        return max(0, $difference - 2 * $K);
    }

    /**
     * leetCode #1185
     * dayOfTheWeek
     *
     * @param  int $day
     * @param  int $month
     * @param  int $year
     *
     * @return string
     */
    public function dayOfTheWeek(int $day, int $month, int $year) : string
    {
        return date('l', mktime(0, 0, 0, $month, $day, $year));
    }

    /**
     * leetCode #821
     * shortestToChar
     *
     * @param  string $S
     * @param  string $C
     *
     * @return array
     */
    public function shortestToChar(string $S, string $C) : array
    {
        $result = [];
        $index = [];
        for ($i = 0; $i < strlen($S); $i++) {
            if ($S[$i] == $C) {
                $index[] = $i;
            }
        }
        for ($j = 0; $j < strlen($S); $j++) {
            $tmp = [];
            foreach ($index as $pos) {
                $tmp[] = abs($j - $pos);
            }
            $result[] = min($tmp);
        }
        return $result;
    }

    /**
     * leetCode #1078
     * findOcurrences
     *
     * @param  string $text
     * @param  string $first
     * @param  string $second
     *
     * @return array
     */
    public function findOcurrences(string $text, string $first, string $second) : array
    {
        $input = explode(' ', $text);
        $result = [];
        $length = count($input);
        for ($i = 0; $i < $length - 2; $i++) {
            if ($input[$i] === $first && $input[$i + 1] === $second) {
                $result[] = $input[$i + 2];
            }
        }
        return $result;
    }

    /**
     * leetCode #344
     * reverseString
     *
     * @param  string $s
     *
     * @return void
     */
    public function reverseString(string &$s)
    {
        $s = array_reverse($s);
    }

    /**
     * leetCode #1030
     * allCellsDistOrder
     *
     * @param  int $R
     * @param  int $C
     * @param  int $r0
     * @param  int $c0
     *
     * @return array
     */
    public function allCellsDistOrder($R, $C, $r0, $c0) : array
    {
        $result = [];
        for ($x = 0; $x < $R; $x++) {
            for ($y = 0; $y < $C; $y++) {
                $result[] = [$x, $y];
            }
        }

        usort($result, function ($item1, $item2) use ($r0, $c0) {
            $d1 = abs($r0 -$item1[0]) + abs($c0 - $item1[1]);
            $d2 = abs($r0 - $item2[0]) + abs($c0 - $item2[1]);
            return $d1 <=> $d2;
        });

        return $result;
    }

    /**
     * leetCode #872
     * leafSimilar
     *
     * @param  TreeNode $root1
     * @param  TreeNode $root2
     *
     * @return bool
     */
    public function leafSimilar(TreeNode $root1, TreeNode $root2) : bool
    {
        $tree1 = new BinaryTree();
        $tree1->root = $root1;
        $tree2 = new BinaryTree();
        $tree2->root = $root2;

        $result1 = [];
        $result2 = [];
        $tree1->preOrder($result1, $root1);
        $tree2->preOrder($result2, $root2);
        return $result1 === $result2;
    }
    
    /**
     * leetCode #867
     * transpose
     *
     * @param  array $A
     *
     * @return array
     */
    public function transpose(array $A) : array
    {
        $n = count($A);
        $n1 = count($A[0]);
        $result = [];
        for ($i = 0; $i < $n1; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $result[$i][$j] = $A[$j][$i];
            }
        }
        return $result;
    }

    /**
     * leetCode #893
     * numSpecialEquivGroups
     *
     * @param  array $A
     *
     * @return int
     */
    public function numSpecialEquivGroups(array $A) : int
    {
        $result = array_map(function ($item) {
            $init = array_fill(97, 56, 0);
            for ($i = 0; $i < strlen($item); $i++) {
                if ($i & 1) {
                    $init[ord($item[$i]) + 26]++;
                } else {
                    $init[ord($item[$i])]++;
                }
            }
            return implode($init);
        }, $A);

        return count(array_unique($result));
    }

    /**
     * leetCode #806
     * numbersOfLines
     *
     * @param  array $widths
     * @param  string $S
     *
     * @return array
     */
    public function numbersOfLines(array $widths, string $S) : array
    {
        $count = 0;
        $newLine = 1;
        for ($i = 0; $i < strlen($S); $i++) {
            $width = $widths[ord($S[$i]) - 97];
            $count += $width;

            if ($count === 100) {
                $count = 0;
                $newLine++;
            } elseif ($count > 100) {
                $count = $width;
                $newLine++;
            }
        }

        return [$newLine, $count];
    }

    /**
     * leetCode #912
     * sortArray
     *
     * @param  mixed $nums
     *
     * @return array
     */
    public function sortArray(array $nums) : array
    {
        sort($nums);
        return $nums;
    }

    /**
     * leetCode #147
     * insertionSortList
     *
     * @param  ListNode $head
     *
     * @return ListNode
     */
    public function insertionSortList(ListNode $head) : ListNode
    {
        $node = new ListNode(0);
        $node->next = $head;
        $pre = $node;
        $current = $head;
        while ($current) {
            if ($current->next === null) {
                break;
            }
            
            if ($current->val > $current->next->val) {
                while (($pre->next) && ($pre->next->val < $current->next->val)) {
                    $pre = $pre->next;
                }
                $temp = $pre->next;
                $pre->next = $current->next;
                $current->next = $current->next->next;
                $pre->next->next = $temp;
                $pre = $node;
            } else {
                $current = $current->next;
            }
        }

        return $node->next;
    }

    /**
     * leetCode #1217
     * minCostToMoveChips
     *
     * @param  array $chips
     *
     * @return int
     */
    public function minCostToMoveChips(array $chips) : int
    {
        $odd = $even = 0;
        for ($i = 0; $i < count($chips); $i++) {
            if ($chips[$i] % 2 === 0) {
                $even++;
            } else {
                $odd++;
            }
        }
        return min($odd, $even);
    }
}
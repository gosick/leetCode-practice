<?php

include_once __DIR__ . '../../autoload.php';

$solution = new Solution\Solution();

// $word = ['hello', 'world', 'leetcode'];
// $chars = 'welldonehoneyr';
// $result = $solution->countCharacters($word, $chars);

// $domain = [
//     '900 google.mail.com',
//     '50 yahoo.com',
//     '1 intel.mail.com',
//     '5 wiki.org'
// ];
// $result = $solution->subdomainVisits($domain);

// $nodeArray = [1, 1, 1, 1, 1, null, 1];
// $nodeArray = [2,2,2,5,2];
// $nodeArray = [1];
// $tree = new Solution\BinaryTree($nodeArray);
// $result = $solution->isUnivalTree($tree->getTreeNode());

// $sortInput = [4, 2, 5, 7];
// $result = $solution->sortArrayByParityII($sortInput);

// $fibInput = 6;
// $result = $solution->fib($fibInput);

$input = [[1, 2], [3, 4]];
$result = $solution->projectionArea($input);
var_dump($result);
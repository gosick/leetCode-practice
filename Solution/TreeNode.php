<?php

namespace Solution;

class TreeNode
{
    // public $parent = null;
    public $val = null;
    public $left = null;
    public $right = null;

    public function __construct(int $value)
    {
        $this->val = $value;
    }
}

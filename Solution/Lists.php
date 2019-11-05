<?php

namespace Solution;

use Solution\ListNode;

class Lists {

    public $root;

    public function __construct(array $input)
    {
        $this->root = $this->build($input);
    }

    public function build(array $input)
    {
        $current = new ListNode(array_shift($input));
        $root = $current;
        while (!empty($input)) {
            $value = array_shift($input);
            $node = new ListNode($value);
            $current->next = $node;
            $current = $node;
        }

        return $root;
    }

    public function convertToArray() : array
    {
        $result = [];
        $current = $this->root;
        while (true) {
            if ($current === null) {
                break;
            }
            $result[] = $current->val;
            $current = $current->next;
        }

        return $result;
    }
}
<?php

namespace Solution;

class Node {

    public $id;
    /**
     * int
     */
    public $val;
    /**
     * Node array
     */
    public $children;

    /**
     * __construct
     *
     * @param  string $id
     * @param  int $val
     * @param  array $children
     *
     * @return void
     */
    public function __construct(string $id, int $val, array $children)
    {
        $this->id = $id;
        $this->val = $val;
        $this->children = $this->transChildrenToNode($children);
    }

    /**
     * transChildrenToNode
     *
     * @param  array $children
     *
     * @return array
     */
    private function transChildrenToNode(array $children) : array
    {

        if (empty($children)) {
            return [];
        }

        $result = [];
        foreach ($children as $key => $value) {
            $result[] = new Node($value['id'], $value['val'], $value['children']);
        }

        return $result;
    }
}
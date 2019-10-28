<?php

namespace Solution;

use Solution\Node;

class DeepTree {

    private $root;

    /**
     * __construct
     *
     * @param  string $case
     *
     * @return void
     */
    public function __construct(string $case)
    {
        $this->parseSource($case);
    }

    /**
     * parseSource
     *
     * @param  string $case
     *
     * @return void
     */
    public function parseSource(string $case)
    {
        $result = json_decode($case, true);
        if (empty($result)) {
            $this->root = null;
        } else {
            $this->root = $this->build($result);
        }
    }

    /**
     * build
     *
     * @param  array $source
     *
     * @return Node
     */
    public function build(array $source) : Node
    {
        return new Node($source['id'], $source['val'], $source['children']);
    }

    /**
     * getRoot
     *
     * @return Node|null
     */
    public function getRoot()
    {
        return $this->root;
    }
}
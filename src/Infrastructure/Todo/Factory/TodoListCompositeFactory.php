<?php

namespace TodoListPatterns\Infrastructure\Todo\Factory;

use TodoListPatterns\Domain\Todo\AbstractTodoListComponent;
use TodoListPatterns\Domain\Todo\Factory\TodoListCompositeFactoryInterface;
use TodoListPatterns\Infrastructure\Todo;

class TodoListCompositeFactory implements TodoListCompositeFactoryInterface
{

    /**
     * The assumption is that the array has the following structure:
     * [
     *  "parent 1" => [
     *    "child 1.1" => [],
     *    "child 1.2" => []
     *  ],
     *  "parent 2" => [],
     * ]
     * @inheritDoc
     */
    public function createComposite(array $list, ?AbstractTodoListComponent $parent = null): AbstractTodoListComponent
    {


    }
}
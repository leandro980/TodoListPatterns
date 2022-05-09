<?php

namespace TodoListPatterns\Infrastructure\Todo\Factory;

use TodoListPatterns\Domain\Todo\AbstractTodoListComponent;
use TodoListPatterns\Domain\Todo\Factory\TodoListCompositeFactoryInterface;
use TodoListPatterns\Domain\Todo\Strategy\TodoListFormatStrategyInterface;
use TodoListPatterns\Infrastructure\Todo\Adapter\TodoListCompositeSplObjectStorageAdapter;
use TodoListPatterns\Infrastructure\Todo;
use TodoListPatterns\Infrastructure\TodoListLeaf;

class TodoListCompositeFactory implements TodoListCompositeFactoryInterface
{

    public function __construct(private readonly TodoListFormatStrategyInterface $strategy)
    {

    }

    /**
     * The assumption is that the array has the following structure:
     * [
     *  "parent 1" => [
     *    "child 1.1" => [],
     *    "child 1.2" => []
     *  ],
     *  "parent 2" => [],
     * ]
     *
     * @inheritDoc
     */
    public function createComposite(array $list, ?AbstractTodoListComponent $parent = null): AbstractTodoListComponent
    {
        if (!$parent) {
            $parent = new TodoListCompositeSplObjectStorageAdapter("", $this->strategy);
        }

        foreach ($list as $element => $children) {
            if (count($children) === 0) {
                $todo = new TodoListLeaf($element, $this->strategy);
            } else {
                $todo = new TodoListCompositeSplObjectStorageAdapter($element, $this->strategy);
            }
            $parent->add($todo);

            if($todo->getComposite()) {
                $this->createComposite($children, $todo);
            }
        }

        return $parent;
    }
}
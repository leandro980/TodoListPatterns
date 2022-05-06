<?php
namespace TodoListPatterns\Domain\Todo\Factory;

use TodoListPatterns\Domain\Todo\AbstractTodoListComponent;

interface TodoListCompositeFactoryInterface
{
    /**
     * @param array $list
     * @param AbstractTodoListComponent|null $parent
     *
     * @return AbstractTodoListComponent
     */
    public function createComposite(array $list, ?AbstractTodoListComponent $parent): AbstractTodoListComponent;
}
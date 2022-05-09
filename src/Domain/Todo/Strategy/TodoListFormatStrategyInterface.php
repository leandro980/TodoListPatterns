<?php

namespace TodoListPatterns\Domain\Todo\Strategy;

use TodoListPatterns\Domain\Todo\AbstractTodoListComponent;

interface TodoListFormatStrategyInterface
{
    public function startList(AbstractTodoListComponent $component): string;

    public function endList(AbstractTodoListComponent $component, string $list): string;
}
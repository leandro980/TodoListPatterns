<?php

namespace TodoListPatterns\Domain\Todo\Strategy;

use TodoListPatterns\Domain\Todo\AbstractTodoListComponent;

interface TodoListFormatStrategyInterface
{
    public function format(AbstractTodoListComponent $component): string;
}
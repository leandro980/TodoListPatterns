<?php

namespace TodoListPatterns\Infrastructure;

use SplObjectStorage;
use TodoListPatterns\Domain\Todo\AbstractTodoListComponent;
use TodoListPatterns\Domain\Todo\Strategy\TodoListFormatStrategyInterface;

class TodoListLeaf extends AbstractTodoListComponent
{

    public function __construct(private readonly string $text,
                                private readonly TodoListFormatStrategyInterface $formatStrategy)
    {

    }

    public function add(AbstractTodoListComponent $component): AbstractTodoListComponent
    {
        return $this;
    }

    public function remove(AbstractTodoListComponent $component): AbstractTodoListComponent
    {
        return $this;
    }

    public function getChildren(): SplObjectStorage
    {
        return new SplObjectStorage();
    }

    public function getStringRepresentation(): string
    {
        $list = $this->formatStrategy->startList($this);
        return $this->formatStrategy->endList($this, $list);
    }

    public function getNodeText(): string
    {
        return $this->text;
    }
}
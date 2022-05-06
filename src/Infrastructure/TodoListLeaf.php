<?php

namespace TodoListPatterns\Infrastructure;

use EmptyIterator;
use Iterator;
use TodoListPatterns\Domain\Todo\AbstractTodoListComponent;

class TodoListLeaf extends AbstractTodoListComponent
{

    public function __construct(private readonly string $text, private readonly ?AbstractTodoListComponent $parent)
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

    public function getChildren(): Iterator
    {
        return new EmptyIterator();
    }

    public function getParent(): ?AbstractTodoListComponent
    {
        return $this->parent;
    }

    public function getStringRepresentation(): string
    {
        return $this->text;
    }
}
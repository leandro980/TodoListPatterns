<?php

namespace TodoListPatterns\Infrastructure\Todo\Adapter;

use Iterator;
use SplObjectStorage;
use TodoListPatterns\Domain\Todo\AbstractTodoListComponent;
use TodoListPatterns\Domain\Todo\Strategy\TodoListFormatStrategyInterface;

class TodoListCompositeSplObjectStorageAdapter extends AbstractTodoListComponent
{

    private SplObjectStorage $children;

    public function __construct(protected readonly string $text,
                                private readonly TodoListFormatStrategyInterface $formatStrategy,
                                private readonly ?AbstractTodoListComponent $parent)
    {
        $this->children = new SplObjectStorage();
    }

    /**
     * @inheritDoc
     */
    public function getStringRepresentation(): string
    {
        return $this->formatStrategy->format($this);
    }

    /**
     * @inheritDoc
     */
    public function getNodeText(): string
    {
        return $this->text;
    }

    /**
     * @inheritDoc
     */
    public function add(AbstractTodoListComponent $component): AbstractTodoListComponent
    {
        $this->children->attach($component);
    }

    /**
     * @inheritDoc
     */
    public function remove(AbstractTodoListComponent $component): AbstractTodoListComponent
    {
        $this->children->detach($component);
    }

    /**
     * @inheritDoc
     */
    public function getParent(): ?AbstractTodoListComponent
    {
        return $this->parent;
    }

    /**
     * @inheritDoc
     */
    public function getChildren(): Iterator
    {
        return $this->children;
    }


}
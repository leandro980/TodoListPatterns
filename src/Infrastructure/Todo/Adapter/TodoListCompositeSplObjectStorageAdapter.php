<?php

namespace TodoListPatterns\Infrastructure\Todo\Adapter;

use SplObjectStorage;
use TodoListPatterns\Domain\Todo\AbstractTodoListComponent;
use TodoListPatterns\Domain\Todo\Strategy\TodoListFormatStrategyInterface;

class TodoListCompositeSplObjectStorageAdapter extends AbstractTodoListComponent
{

    private SplObjectStorage $children;

    public function __construct(protected readonly string $text,
                                private   readonly TodoListFormatStrategyInterface $formatStrategy,
                                private   readonly ?AbstractTodoListComponent $parent)
    {
        $this->children = new SplObjectStorage();
    }

    /**
     * @inheritDoc
     */
    public function getStringRepresentation(): string
    {

        $list = $this->formatStrategy->startList($this);

        /** @var AbstractTodoListComponent $child */
        foreach ($this->getChildren() as $child) {
            $list .= $child->getStringRepresentation();
        }

        return $this->formatStrategy->endList($this, $list);
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
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function remove(AbstractTodoListComponent $component): AbstractTodoListComponent
    {
        $this->children->detach($component);
        return $this;
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
    public function getChildren(): SplObjectStorage
    {
        return $this->children;
    }

    public function getComposite(): ?AbstractTodoListComponent
    {
        return $this;
    }

}
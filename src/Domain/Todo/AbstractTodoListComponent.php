<?php

namespace TodoListPatterns\Domain\Todo;

use SplObjectStorage;

abstract class AbstractTodoListComponent
{

    /**
     * Returns the string representation of the list
     * This is the "Operation" of the Composite Pattern
     *
     * @return string
     */
    abstract public function getStringRepresentation(): string;

    /**
     * Returns the node text
     *
     * @return string
     */
    abstract public function getNodeText(): string;

    /**
     * Adds a component to the list of children
     *
     * @param AbstractTodoListComponent $component
     *
     * @return AbstractTodoListComponent
     */
    abstract public function add(AbstractTodoListComponent $component): AbstractTodoListComponent;

    /**
     * Removes a component from the list of children
     *
     * @param AbstractTodoListComponent $component
     *
     * @return AbstractTodoListComponent
     */
    abstract public function remove(AbstractTodoListComponent $component): AbstractTodoListComponent;

    /**
     * Gets the children of the composite
     *
     * @return SplObjectStorage
     */
    abstract public function getChildren(): SplObjectStorage;

    /**
     * See "Design Patterns - Elements of reusable object-oriented software" pag. 167 point 4
     * Declaring the child Management Operations, safety vs transparency.
     * The Gof prefers transparency.
     *
     * @return AbstractTodoListComponent|null
     */
    public function getComposite(): ?AbstractTodoListComponent{
        return null;
    }
}
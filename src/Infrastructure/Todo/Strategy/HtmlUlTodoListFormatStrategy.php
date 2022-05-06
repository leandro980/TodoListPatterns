<?php

namespace TodoListPatterns\Infrastructure\Todo\Strategy;

use TodoListPatterns\Domain\Todo\AbstractTodoListComponent;
use TodoListPatterns\Domain\Todo\Strategy\TodoListFormatStrategyInterface;

class HtmlUlTodoListFormatStrategy implements TodoListFormatStrategyInterface
{


    public function format(AbstractTodoListComponent $component): string
    {
        $output = "";

        if (!$component->getParent()) {
            $output .= "<ul>";
        }

        $output .= "<li>" . $component->getText();
        /** @var AbstractTodoListComponent $child */
        foreach ($component->getChildren() as $child) {
            if($child->getComposite()) {
                $output .= $child->getStringRepresentation();
            }
        }
        $output .= "</li>";

        if (!!$component->getParent()) {
            $output .= "</ul>";
        }

        return $output;
    }
}
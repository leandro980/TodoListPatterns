<?php

namespace TodoListPatterns\Infrastructure\Todo\Strategy;

use TodoListPatterns\Domain\Todo\AbstractTodoListComponent;
use TodoListPatterns\Domain\Todo\Strategy\TodoListFormatStrategyInterface;

class HtmlUlTodoListFormatStrategy implements TodoListFormatStrategyInterface
{

    public function startList(AbstractTodoListComponent $component): string
    {
        $output = "";

        if (!empty($component->getNodeText())) {
            $output .= "<li>" . $component->getNodeText();
        }

        if (count($component->getChildren()) > 0) {
            $output .= "<ul>";
        }

        return $output;
    }

    public function endList(AbstractTodoListComponent $component, string $list): string
    {

        if (count($component->getChildren()) > 0) {
            $list .= "</ul>";
        }

        if (!empty($component->getNodeText())) {
            $list .= "</li>";
        }

        return $list;
    }
}
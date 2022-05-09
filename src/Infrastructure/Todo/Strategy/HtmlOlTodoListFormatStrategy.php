<?php

namespace TodoListPatterns\Infrastructure\Todo\Strategy;

use TodoListPatterns\Domain\Todo\AbstractTodoListComponent;
use TodoListPatterns\Domain\Todo\Strategy\TodoListFormatStrategyInterface;

class HtmlOlTodoListFormatStrategy implements TodoListFormatStrategyInterface
{

    public function startList(AbstractTodoListComponent $component): string
    {
        $output = "";

        if (!empty($component->getNodeText())) {
            $output .= "<li>" . $component->getNodeText();
        }

        if (count($component->getChildren()) > 0) {
            $output .= "<ol>";
        }

        return $output;
    }

    public function endList(AbstractTodoListComponent $component, string $list): string
    {

        if (count($component->getChildren()) > 0) {
            $list .= "</ol>";
        }

        if (!empty($component->getNodeText())) {
            $list .= "</li>";
        }

        return $list;
    }
}
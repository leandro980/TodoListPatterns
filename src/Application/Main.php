<?php

namespace TodoListPatterns\Application;

use TodoListPatterns\Infrastructure\Todo\Factory\TodoListCompositeFactory;
use TodoListPatterns\Infrastructure\Todo\Strategy\HtmlOlTodoListFormatStrategy;
use TodoListPatterns\Infrastructure\Todo\Strategy\HtmlUlTodoListFormatStrategy;

class Main
{
    public static function start(array $list): void
    {
        $ulStrategy = new HtmlUlTodoListFormatStrategy();
        $ulFactory = new TodoListCompositeFactory($ulStrategy);
        $ulComposite = $ulFactory->createComposite($list, null);

        $olStrategy = new HtmlOlTodoListFormatStrategy();
        $olFactory = new TodoListCompositeFactory($olStrategy);
        $olComposite = $olFactory->createComposite($list, null);

        echo $olComposite->getStringRepresentation();
        echo $ulComposite->getStringRepresentation();
    }
}
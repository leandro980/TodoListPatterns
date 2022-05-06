<?php
namespace TodoListPatterns\Infrastructure\Todo\Factory;

enum HtmlListType
{
    /**
     * Refers to a html <ol> list
     */
    case Ordered;
    /**
     * Refers to a html <ul> list
     */
    case Unordered;
    /**
     * Refers to a html <dl> list
     */
    case Description;
}
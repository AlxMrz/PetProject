<?php

namespace core;

use \core\view\View;

abstract class Controller extends BaseController
{
    /**
     * @var View
     */
    protected $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }

    /**
     * @param string $template
     * @param array $data
     * @return string
     */
    protected function render(string $template, array $data): string
    {
        return $this->view->render($template, $data);
    }
}
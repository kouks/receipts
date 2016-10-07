<?php

namespace App\Support;

class Breadcrumbs
{
    /**
     * @var string
     */
    protected $html = '';

    /**
     * Building breadcrumb fragment
     *
     * @param  string  $path
     * @param  string  uri
     * @return self
     */
    public function fragment($name, $uri)
    {
        $this->html .= '<a href="' . $uri . '" class="button is-white">' . $name . '</a>';
        $this->html .= '<a class="button is-white is-disabled">/</a>';

        return $this;
    }

    /**
     * Method which adds current view to breadcrumbs
     *
     * @param  string  $current
     * @return self
     */
    public function current($current)
    {
        $this->html .= '<a class="button is-white is-disabled">' . $current . '</a>';

        return $this;
    }

    /**
     * Converts class to string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->html;
    }
}

<?php

namespace Xzxzyzyz\LaravelNovaLinkTool;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class LinkTool extends Tool
{
    protected $icon = 'link';

    protected $links = [];

    protected $parent = [
        'label' => 'Links',
        'link' => null,
        'router' => false,
    ];

    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('laravel-nova-link-tool', __DIR__.'/../dist/js/tool.js');
        Nova::style('laravel-nova-link-tool', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('laravel-nova-link-tool::navigation')->with([
            'icon' => Icon::make($this->icon),
            'parent' => $this->parent,
            'links' => $this->links,
        ]);
    }

    public function label($value)
    {
        $this->parent['label'] = $value;

        return $this;
    }

    public function link($value, bool $router = false)
    {
        $this->parent['link'] = $value;
        $this->parent['router'] = $router;

        return $this;
    }

    public function icon($value)
    {
        $this->icon = $value;

        return $this;
    }

    public function addLinks(string $label, string $url, bool $router = false, string $target = '_self')
    {
        $this->links[] = [
            'label' => $label,
            'url' => $url,
            'router' => $router,
            'target' => $target,
        ];

        return $this;
    }
}

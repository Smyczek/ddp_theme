<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class ButtonLink extends Component
{
    /**
     * The button link type.
     *
     * @var string
     */
    public $type;

    /**
     * The button link message.
     *
     * @var string
     */
    public $message;

    /**
     * The button link.
     *
     * @var url
     */
    public $url;

    /**
     * The button link types.
     *
     * @var array
     */
    public $types = [
        'default' => 'btn btn-primary inline-block text-3xl py-3.5 px-12 transform transition duration-500 hover:scale-110',
        'success' => 'text-green-50 bg-green-400',
        'caution' => 'text-yellow-50 bg-yellow-400',
        'warning' => 'text-red-50 bg-red-400',
    ];

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @param  url     $url
     * @return void
     */
    public function __construct($type = 'default', $message = null, $url = '#')
    {
        $this->type = $this->types[$type] ?? $this->types['default'];
        $this->message = $message;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.button-link');
    }
}

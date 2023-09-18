<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Package extends Component
{
    /**
     * The package text.
     *
     * @var string
     */
    public $heading;

    /**
     * The package bg color.
     *
     * @var string
     */
    public $bgColor;

    /**
     * The package price.
     *
     * @var string
     */
    public $price;

    /**
     * The package old price.
     *
     * @var string
     */
    public $oldPrice;

    /**
     * The package description.
     *
     * @var string
     */
    public $description;

   

    /**
     * Create the component instance.
     *
     * @param  string  $heading
     * @param  string  $bgColor
     * @param  string  $price
     * @param  string  $oldPrice
     * @param  string  $description
     * @return void
     */
    public function __construct($heading = null, $bgColor, $price = null, $oldPrice = null, $description = null)
    {
        $this->heading = $heading;
        $this->bgColor = $bgColor;
        $this->price = $price;
        $this->oldPrice = $oldPrice;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.package');
    }
}

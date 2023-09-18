<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class ServiceSection extends Component
{
    /**
     * The service section title.
     *
     * @var string
     */
    public $title;

    /**
     * The service section ID.
     *
     * @var string
     */
    public $sectionId;

    /**
     * The service section text.
     *
     * @var string
     */
    public $text;

    /**
     * The service section icon image ID.
     *
     * @var number
     */
    public $imageId;

    /**
     * The service section galery button text.
     *
     * @var string
     */
    public $btnText;

    /**
     * The service section background.
     * 
     * @var boolean
     */
    public $bgColor;

     /**
     * The service section ACF Gallery.
     * 
     * @var array
     */
    protected $acfGallery;

    /**
     * The service section photo gallery ID's.
     * 
     * @var array
     */
    public $photoGallery;

    /**
     * Create the component instance.
     *
     * @param  string  $title
     * @param  string  $sectionId
     * @param  string  $text
     * @param  number  $imageId
     * @param  image   $imageIcon
     * @param  string  $btnText
     * @param  boolean $bgColor
     * @param  array   $acfGallery
     * @param  array   $photoGallery
     * @return void
     */
    public function __construct(
        $title = null, 
        $sectionId = null, 
        $text = null, 
        $imageId = null, 
        $btnText = null, 
        $bgColor = false,
        $acfGallery = []
    )
    {
        $this->title = $title;
        $this->sectionId = $sectionId;
        $this->text = $text;
        $this->imageId = $imageId;
        $this->btnText = $btnText;
        $this->bgColor = $bgColor;
        $this->acfGallery = $acfGallery;
        $this->photoGallery = $this->photoGallery();
    }

    /**
     * Retrun only gallery id's array form ACF Gallery
     * 
     * @return array
     */
    protected function photoGallery()
    {
        $photoGallery = [];

        foreach ($this->acfGallery as $item) {
            if (isset($item['id'])) {
                $photoGallery[] = $item['id'];
            }
        }

        return $photoGallery;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.service-section');
    }
}

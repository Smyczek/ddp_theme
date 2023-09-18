<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class SectionTitle extends Component
{
    /**
     * The alert title.
     *
     * @var string
     */
    public $title;

    /**
     * The service section icon image ID.
     *
     * @var number
     */
    protected $imageId;

    /**
     * The service section imageIcon.
     *
     * @var image
     */
    public $imageIcon;

    /**
     * Create the component instance.
     *
     * @param  string  $title
     * @param  number  $imageId
     * @param  image   $imageIcon
     * @return void
     */
    public function __construct($title = null, $imageId = null)
    {
        $this->title = $title;
        $this->imageId = $imageId;
        $this->imageIcon = $this->getImage();
    }

    /**
     * Return image from ID
     * 
     * @return image
     */
    protected function getImage()
    {
        if (!is_numeric($this->imageId)) {
            return false;
        }
        
        return wp_get_attachment_image($this->imageId, 'medium_large');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.section-title');
    }
}

<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class Testimonial extends Component
{
    /**
     * The service section text.
     *
     * @var string
     */
    public $text;

    /**
     * The service section author.
     *
     * @var string
     */
    public $author;

    /**
     * The service section date.
     *
     * @var string
     */
    public $date;

    /**
     * The service section img ID.
     *
     * @var number
     */
    public $imageId;

    /**
     * The service section avatar.
     *
     * @var image
     */
    public $avatar;

    /**
     * Create the component instance.
     *
     * @param  string  $text
     * @param  string  $author
     * @param  string  $date
     * @param  image   $avatar
     * @return void
     */
    public function __construct($text, $author, $date, $imageId = null, $avatar = null)
    {
        $this->text = $text;
        $this->author = $author;
        $this->date = $date;
        $this->imageId = $imageId;
        $this->avatar = $this->getImage();
    }

    protected function getImage()
    {
        if (!is_numeric($this->imageId)) {
            return false;
        }
        
        return wp_get_attachment_image($this->imageId, 'small_medium');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.testimonial');
    }
}

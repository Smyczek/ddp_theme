<?php

namespace App\View\Components;

use Roots\Acorn\View\Component;

class QuestionAnswer extends Component
{
    /**
     * The Q&A question.
     *
     * @var string
     */
    public $question;

    /**
     * The Q&A answer.
     *
     * @var string
     */
    public $answer;

    /**
     * The Q&A ID.
     *
     * @var number
     */
    public $id;
   

    /**
     * Create the component instance.
     *
     * @param  string  $question
     * @param  string  $answer
     * @param  number  $id
     * @return void
     */
    public function __construct($question = null, $answer = null, $id)
    {
        $this->question = $question;
        $this->answer = $answer;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return $this->view('components.question-answer');
    }
}

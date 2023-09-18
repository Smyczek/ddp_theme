<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

include_once(__DIR__ . '/../../QuoteFormProcessing.php');

class QuoteForm extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'forms.quote-form'
    ];

    public function with()
    {

        if (isset($_POST['quote_form_nonce'])) {
            process_quote_form();
        }

        $errors = [];
        $success = [];

        // Check for query parameters and decode them
        if (isset($_GET['quote_form_errors'])) {
            $decodedOnce = stripslashes($_GET['quote_form_errors']);
            $errors = json_decode($decodedOnce, true);
        }

        if (isset($_GET['quote_form_success'])) {
            $success = $_GET['quote_form_success'];
        }

        return [
            'errors' => $errors, 
            'success' => $success,
        ];
    }
}
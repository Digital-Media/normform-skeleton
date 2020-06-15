<?php

namespace NormFormSkeleton;

use Fhooe\NormForm\Core\AbstractNormForm;
use Fhooe\NormForm\View\View;

/**
 * A demo implementation of AbstractNormForm.
 *
 * @package NormFormSkeleton
 * @author Wolfgang Hochleitner <wolfgang.hochleitner@fh-hagenberg.at>
 * @author Martin Harrer <martin.harrer@fh-hagenberg.at>
 * @author Rimbert Rudisch-Sommer <rimbert.rudisch-sommer@fh-hagenberg.at>
 * @version 1.1.2
 */
class NormFormDemo extends AbstractNormForm
{
    /**
     * Holds the results of the form submission (assigned in business()).
     *
     * @var array
     */
    private $result;

    /**
     * Constructor for creating a new object. Use this to perform initializations of properties you need throughout your
     * application, otherwise leave it as is. Do not remove the call to the parent constructor.
     * @param $template Holds the initial template name used for displaying the form.
     */

    public function __construct($template)
    {
        parent::__construct($template);
    }

    /**
     * Validates the form submission. The criteria for this example are non-empty fields for first and last name.
     * These are checked using isEmptyPostField() in two separate if-clauses.
     * If a criterion is violated, an entry in errorMessages is created.
     * The array holding these error messages is then added to the parameters of the current view. If no error
     * messages where created, validation is seen as successful.
     *
     * @return bool Returns true if validation was successful, otherwise false.
     */
    protected function isValid(): bool
    {
        $params = $this->getBodyParams();
        if ($this->isEmptyPostField('firstname')) {
            $this->errorMessages['firstname'] = "First name is required.";
        }
        if ($this->isEmptyPostField('lastname')) {
            $this->errorMessages['lastname'] = "Last name is required.";
        }
        $this->templateParameters['firstname'] = $params['firstname'];
        $this->templateParameters['lastname'] = $params['lastname'];
        $this->templateParameters['errorMessages'] = $this->errorMessages;

        return (count($this->errorMessages) === 0);
    }

    /**
     * Business logic method used to process the data that was used after a successful validation. In this example the
     * received data is stored in result and passed on to the view. In more complex scenarios this would be the
     * place to add things to a database or perform other tasks before displaying the data.
     */
    protected function business(): void
    {
        $this->templateParameters['firstname'] = "";
        $this->templateParameters['lastname'] = "";
        $this->templateParameters['result'] = $_POST;
        $this->templateParameters['statusMessage'] = "Processing successful!";
    }
}
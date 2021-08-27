<?php 

namespace rasteiner\KEL;
use Exception;

class ParseError extends Exception {
    public function __construct(private array $errorList) {
        $errorListString = "\n";
        foreach ($errorList as $error) {
            $errorListString .= "$error[line]:$error[col] - $error[msg]\n";
        }
        parent::__construct('Parse error: ' . $errorListString);
    }

    public function getErrorList() {
        return $this->errorList;
    }

}
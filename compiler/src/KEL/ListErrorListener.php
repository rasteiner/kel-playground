<?php
namespace rasteiner\KEL;

use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
use Antlr\Antlr4\Runtime\Error\Listeners\BaseErrorListener;
use Antlr\Antlr4\Runtime\Recognizer;

class ListErrorListener extends BaseErrorListener
{
    public $errorList = [];

    public function hasErrors() {
        return !empty($this->errorList);
    }

    public function __toString() {
        return join("\n", array_map(function($item) {
            return 'line ' . $item['line'] . ':' . $item['col'] . ' - ' . $item['msg'];
        }, $this->errorList));
    }

    public function syntaxError(
        Recognizer $recognizer,
        ?object $offendingSymbol,
        int $line,
        int $charPositionInLine,
        string $msg,
        ?RecognitionException $e
    ) : void {
        $this->errorList[] = [
            'line' => $line,
            'col' => $charPositionInLine,
            'msg' => $msg,
        ];
    }
}
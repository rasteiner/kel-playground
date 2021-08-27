<?php 
namespace rasteiner\KEL;

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\InputStream;
use rasteiner\KEL\generated\KELLexer;
use rasteiner\KEL\generated\KELParser;

class Compiler {
    private $lastErrors = [];

    public function __construct(public bool $strictMode = true) {
    }

    public function lastErrors(): array {
        return $this->lastErrors;
    }

    public function parse(string $code) : ?ExpressionNode {
        $input = InputStream::fromString($code);
        $lexer = new KELLexer($input);
        $tokens = new CommonTokenStream($lexer);
        $parser = new KELParser($tokens);

        $errorList= new ListErrorListener();
        $parser->addErrorListener($errorList);

        $cst = $parser->expression();
        $ast = (new BuildAstVisitor())->visit($cst);
        
        $this->lastErrors = $errorList->errorList;

        if ($this->strictMode && $errorList->hasErrors()) {
            throw new ParseError($errorList->errorList);
        }

        return $ast;
    }
}
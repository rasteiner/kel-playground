<?php 

declare(strict_types=1);

use rasteiner\KEL\AdditionNode;
use rasteiner\KEL\ArrayLiteralNode;
use rasteiner\KEL\Compiler;
use rasteiner\KEL\DefaultNode;
use rasteiner\KEL\ExponentiationNode;
use rasteiner\KEL\IdentifierNode;
use rasteiner\KEL\MatchEntryNode;
use rasteiner\KEL\MatchNode;
use rasteiner\KEL\MemberNode;
use rasteiner\KEL\MultiplicationNode;
use rasteiner\KEL\NumericLiteralNode;
use rasteiner\KEL\ObjectLiteralNode;
use rasteiner\KEL\StringLiteralNode;
use rasteiner\KEL\SubtractionNode;
use rasteiner\KEL\TernaryNode;
use rasteiner\KEL\VariableNode;

final class CompilerTest extends \PHPUnit\Framework\TestCase {
    public function testAddition() {
        $this->assertEquals(
            (new Compiler())->parse("1 + 2"),
            new AdditionNode(
                new NumericLiteralNode(1),
                new NumericLiteralNode(2)
            )
        );
    }
    public function testSubtraction() {
        $this->assertEquals(
            (new Compiler())->parse("1 - 2"),
            new SubtractionNode(
                new NumericLiteralNode(1),
                new NumericLiteralNode(2)
            )
        );
    }
    public function testMultiplication() {
        $this->assertEquals(
            (new Compiler())->parse("1 * 2"),
            new MultiplicationNode(
                new NumericLiteralNode(1),
                new NumericLiteralNode(2)
            )
        );
    }
    public function testExponentiation() {
        $this->assertEquals(
            (new Compiler())->parse("2 ** 24"),
            new ExponentiationNode(
                new NumericLiteralNode(2),
                new NumericLiteralNode(24)
            )
        );
    }
    public function testOperatorPrecedence() {
        $this->assertEquals(
            (new Compiler())->parse("3 + 4 * 5 - 6"),
            new SubtractionNode(
                new AdditionNode(
                    new NumericLiteralNode(3),
                    new MultiplicationNode(
                        new NumericLiteralNode(4),
                        new NumericLiteralNode(5)
                    )
                ),
                new NumericLiteralNode(6)
            )
        );
    }
    public function testOperatorPrecedenceParens() {
        $this->assertEquals(
            (new Compiler())->parse("(3 + 4) * 5 - 6"),
            new SubtractionNode(
                new MultiplicationNode(
                    new AdditionNode(
                        new NumericLiteralNode(3),
                        new NumericLiteralNode(4),
                    ), 
                    new NumericLiteralNode(5)
                ),
                new NumericLiteralNode(6)
            )
        );
    }
    public function testObjectLiteral() {
        $this->assertEquals(
            (new Compiler())->parse("{ foo: 'bar' }"),
            new ObjectLiteralNode(
                [
                    'foo' => new StringLiteralNode('bar')
                ]
            )
        );
    }

    public function testObjectLiteralWithNumericKeys() {
        $this->assertEquals(
            (new Compiler())->parse("{ 1: 'bar' }"),
            new ObjectLiteralNode(
                [
                    1 => new StringLiteralNode('bar')
                ]
            )
        );
    }

    public function testObjectLiteralWithRepeatingKeys() {
        $this->assertEquals(
            (new Compiler())->parse("{ foo: 'bar', foo: 'baz' }"),
            new ObjectLiteralNode(
                [
                    'foo' => new StringLiteralNode('baz')
                ]
            )
        );
    }

    public function testObjectLiteralWithRepeatingKeys2() {
        $this->assertEquals(
            (new Compiler())->parse("{ 'foo': 'bar', foo: 'baz' }"),
            new ObjectLiteralNode(
                [
                    'foo' => new StringLiteralNode('baz')
                ]
            )
        );
    }
    
    public function testObjectLiteralWithRepeatingKeys3() {
        $this->assertEquals(
            (new Compiler())->parse("{ '1': 'bar', 1: 'baz' }"),
            new ObjectLiteralNode(
                [
                    '1' => new StringLiteralNode('baz')
                ]
            )
        );
    }

    public function testArrayLiteral() {
        $this->assertEquals(
            (new Compiler())->parse("[1, 2, 3]"),
            new ArrayLiteralNode([
                new NumericLiteralNode(1),
                new NumericLiteralNode(2),
                new NumericLiteralNode(3)
            ])
        );
    }

    public function testNestedArrayLiteral() {
        $this->assertEquals(
            (new Compiler())->parse("[1, [2, 3], 4, 5]"),
            new ArrayLiteralNode([
                new NumericLiteralNode(1),
                new ArrayLiteralNode([
                    new NumericLiteralNode(2),
                    new NumericLiteralNode(3)
                ]),
                new NumericLiteralNode(4),
                new NumericLiteralNode(5)
            ])
        );
    }


    public function testTernary() {
        $this->assertEquals(
            (new Compiler())->parse("1 ? 2 : 3"),
            new TernaryNode(
                new NumericLiteralNode(1),
                new NumericLiteralNode(2),
                new NumericLiteralNode(3)
            )
        );
    }

    public function testTernary2() {
        $this->assertEquals(
            (new Compiler())->parse("1 ? 2 : 3 ? 4 : 5"),
            new TernaryNode(
                new NumericLiteralNode(1),
                new NumericLiteralNode(2),
                new TernaryNode(
                    new NumericLiteralNode(3),
                    new NumericLiteralNode(4),
                    new NumericLiteralNode(5)
                )
            )
        );
    }

    public function testTernary3() {
        $this->assertEquals(
            (new Compiler())->parse("1 ? 2 ? 3 : 4 : 5"),
            new TernaryNode(
                new NumericLiteralNode(1),
                new TernaryNode(
                    new NumericLiteralNode(2),
                    new NumericLiteralNode(3),
                    new NumericLiteralNode(4)
                ),
                new NumericLiteralNode(5),
            )
        );
    }

    public function testTernary4() {
        $this->assertEquals(
            (new Compiler())->parse("(1 ? 2 : 3) ? 4 : 5"),
            new TernaryNode(
                new TernaryNode(
                    new NumericLiteralNode(1),
                    new NumericLiteralNode(2),
                    new NumericLiteralNode(3),
                ),
                new NumericLiteralNode(4),
                new NumericLiteralNode(5)
            )
        );
    }

    public function testVariable() {
        $this->assertEquals(
            (new Compiler())->parse("foo"),
            new VariableNode('foo')
        );
    }

    public function testMemberAccess() {
        $this->assertEquals(
            (new Compiler())->parse("foo.bar.baz"),
            new MemberNode(
                new MemberNode(
                    new VariableNode('foo'),
                    new IdentifierNode('bar'),
                ),
                new IdentifierNode('baz')
            )
        );
    }

    public function testMatch() {
        $this->assertEquals(
            (new Compiler())->parse("foo => { bar -> baz, 23,24 -> 'num', default -> 100 }"),
            new MatchNode(
                new VariableNode('foo'),
                [
                    new MatchEntryNode([ new VariableNode('bar') ], new VariableNode('baz') ),
                    new MatchEntryNode([ new NumericLiteralNode(23), new NumericLiteralNode(24) ], new StringLiteralNode('num') ),
                    new MatchEntryNode([ new DefaultNode() ], new NumericLiteralNode(100) )
                ]
            )
        );
    }

    public function testComplex() {
        $this->assertEquals(
            (new Compiler())->parse("((1 + 2 * 3) * 0 ? [ item, 'string', 2, 1+2, { prop: 2 }] : two) => { one -> 1, two, three -> [2, 3]}"),
            new MatchNode(
                new TernaryNode(
                    new MultiplicationNode(
                        new AdditionNode(
                            new NumericLiteralNode(1),
                            new MultiplicationNode(
                                new NumericLiteralNode(2),
                                new NumericLiteralNode(3)
                            )
                        ),
                        new NumericLiteralNode(0)
                    ),
                    new ArrayLiteralNode([
                        new VariableNode('item'),
                        new StringLiteralNode('string'),
                        new NumericLiteralNode(2),
                        new AdditionNode(
                            new NumericLiteralNode(1),
                            new NumericLiteralNode(2)
                        ),
                        new ObjectLiteralNode([
                            'prop' => new NumericLiteralNode(2)
                        ])
                    ]),
                    new VariableNode('two')
                ),
                [
                    new MatchEntryNode([new VariableNode('one')], new NumericLiteralNode(1)),
                    new MatchEntryNode([new VariableNode('two'), new VariableNode('three')], new ArrayLiteralNode([ new NumericLiteralNode(2), new NumericLiteralNode(3) ])),
                ]
            )
        );
    }
}
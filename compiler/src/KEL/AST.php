<?php

namespace rasteiner\KEL;

use JsonSerializable;

class ExpressionNode implements JsonSerializable {
    public function jsonSerialize() {
        return array_merge(
            get_object_vars($this),
            ['node' => (new \ReflectionClass($this))->getShortName()]
        );
    }
}

class IdentifierNode extends ExpressionNode 
{
    public function __construct(public string $id){}
}
class VariableNode extends ExpressionNode
{
    public function __construct(public string $id){}
}
class MemberNode extends ExpressionNode
{
    public function __construct(public ExpressionNode $left, public ExpressionNode $right){}
}
class AdditionNode extends ExpressionNode
{
    public function __construct(public ExpressionNode $left, public ExpressionNode $right){}
}
class SubtractionNode extends ExpressionNode
{
    public function __construct(public ExpressionNode $left, public ExpressionNode $right){}
}
class MultiplicationNode extends ExpressionNode
{
    public function __construct(public ExpressionNode $left, public ExpressionNode $right){}
}
class DivisionNode extends ExpressionNode
{
    public function __construct(public ExpressionNode $left, public ExpressionNode $right){}
}
class ModulusNode extends ExpressionNode
{
    public function __construct(public ExpressionNode $left, public ExpressionNode $right){}
}
class ExponentiationNode extends ExpressionNode
{
    public function __construct(public ExpressionNode $left, public ExpressionNode $right){}
}
class NumericLiteralNode extends ExpressionNode
{
    public function __construct(public float $value){}
}
class BooleanLiteralNode extends ExpressionNode
{
    public function __construct(public bool $value){}
}
class StringLiteralNode extends ExpressionNode
{
    public function __construct(public string $value){}
}
class NullNode extends ExpressionNode
{
    public function __construct(){}
}

class NotNode extends ExpressionNode
{
    public function __construct(public ExpressionNode $value){}
}
class CoalesceNode extends ExpressionNode
{
    public function __construct(public ExpressionNode $left, public ExpressionNode $right){}
}
class AndNode extends ExpressionNode
{
    public function __construct(public ExpressionNode $left, public ExpressionNode $right){}
}
class OrNode extends ExpressionNode
{
    public function __construct(public ExpressionNode $left, public ExpressionNode $right){}
}
class ComparativeNode extends ExpressionNode
{
    public function __construct(public ExpressionNode $left, public string $op, public ExpressionNode $right){}
}
class EqualityNode extends ExpressionNode
{
    public function __construct(public ExpressionNode $left, public string $op, public ExpressionNode $right){}
}
class TernaryNode extends ExpressionNode 
{
    public function __construct(public ExpressionNode $condition, public ExpressionNode $whentrue, public ExpressionNode $whenfalse){}
}
class MatchNode extends ExpressionNode
{
    public function __construct(public ExpressionNode $subject, public array $entries) {}
}
class MatchEntryNode extends ExpressionNode
{
    public function __construct(public array $options, public ExpressionNode $value){}
}
class DefaultNode extends ExpressionNode
{
    public function __construct(){}
}
class ObjectLiteralNode extends ExpressionNode
{
    public function __construct(public array $properties){}
}
class ArrayLiteralNode extends ExpressionNode
{
    public function __construct(public array $items){}
}
<?php

namespace rasteiner\KEL;

use rasteiner\KEL\generated\Context;
use rasteiner\KEL\generated\Context\FallbackContext;
use rasteiner\KEL\generated\KELBaseVisitor;
use rasteiner\KEL\generated\KELParser;

class BuildAstVisitor extends KELBaseVisitor {
    public function visitMemberExpression(Context\MemberExpressionContext $ctx) {
        return new MemberNode($this->visit($ctx->left), $this->visit($ctx->right));
    }
    public function visitSubscriptExpression(Context\SubscriptExpressionContext $ctx) {
        return new MemberNode($this->visit($ctx->left), $this->visit($ctx->right));
    }
    public function visitVariableExpression(Context\VariableExpressionContext $context){
        return new VariableNode($context->id->getText());
    }
    public function visitIdentifierName(Context\IdentifierNameContext $ctx) {
        return new IdentifierNode($ctx->getText());
    }
    public function visitParenthesizedExpression(Context\ParenthesizedExpressionContext $ctx) {
        return $this->visit($ctx->inner);
    }
    public function visitNotExpression(Context\NotExpressionContext $ctx) {
        return new NotNode($this->visit($ctx->right));
    }
    public function visitUnaryAddExpression(Context\UnaryAddExpressionContext $ctx) {
        return $this->visit($ctx->right);
    }
    public function visitUnarySubExpression(Context\UnarySubExpressionContext $ctx) {
        return new SubtractionNode(new NumericLiteralNode(0), $this->visit($ctx->right));
    }
    public function visitMultiplicativeExpression(Context\MultiplicativeExpressionContext $ctx) {
        return match($ctx->op->getText()) {
            '*' => new MultiplicationNode($this->visit($ctx->left), $this->visit($ctx->right)),
            '/' => new DivisionNode($this->visit($ctx->left), $this->visit($ctx->right)),
            '%' => new ModulusNode($this->visit($ctx->left), $this->visit($ctx->right)),
        };
    }
    public function visitAdditiveExpression(Context\AdditiveExpressionContext $ctx) {
        return match ($ctx->op->getText()) {
            '+' => new AdditionNode($this->visit($ctx->left), $this->visit($ctx->right)),
            '-' => new SubtractionNode($this->visit($ctx->left), $this->visit($ctx->right)),
        };
    }
    public function visitExponentiationExpression(Context\ExponentiationExpressionContext $context) {
        return new ExponentiationNode($this->visit($context->base), $this->visit($context->exponent));
    }
    public function visitCoalesceExpression(Context\CoalesceExpressionContext $ctx) {
        return new CoalesceNode($this->visit($ctx->left), $this->visit($ctx->right));
    }
    public function visitRelationalExpression(Context\RelationalExpressionContext $ctx) {
        return new ComparativeNode($this->visit($ctx->left), $ctx->op->getText(), $this->visit($ctx->right));
    }
    public function visitEqualityExpression(Context\EqualityExpressionContext $ctx) {
        return new ComparativeNode($this->visit($ctx->left), $ctx->op->getText(), $this->visit($ctx->right));
    }
    public function visitAndExpression(Context\AndExpressionContext $ctx) {
        return new AndNode($this->visit($ctx->left), $this->visit($ctx->right));
    }
    public function visitOrExpression(Context\OrExpressionContext $ctx) {
        return new OrNode($this->visit($ctx->left), $this->visit($ctx->right));
    }
    public function visitTernaryExpression(Context\TernaryExpressionContext $ctx) {
        return new TernaryNode($this->visit($ctx->condition), $this->visit($ctx->whentrue), $this->visit($ctx->whenfalse));
    }
    public function visitMatchExpression(Context\MatchExpressionContext $ctx) {
        return new MatchNode($this->visit($ctx->subject), $this->visit($ctx->right));
    }
    public function visitMatchList(Context\MatchListContext $ctx) {
        return array_map(function($ctx) {
            return $this->visit($ctx);
        }, $ctx->entries);
    }
    public function visitMatchEntry(Context\MatchEntryContext $ctx) {
        if($ctx->left) {
            return new MatchEntryNode($this->visit($ctx->left), $this->visit($ctx->right));
        } else {
            return new MatchEntryNode([$this->visit($ctx->fallback())], $this->visit($ctx->right));
        }
    }
    public function visitFallback(FallbackContext $ctx) {
        return new DefaultNode();
    }
    public function visitExpressionSequence(Context\ExpressionSequenceContext $ctx) {
        return array_map(function($ctx) {
            return $this->visit($ctx);
        }, $ctx->items);
    }

    public function visitObjectLiteral(Context\ObjectLiteralContext $ctx) {
        return new ObjectLiteralNode($this->visit($ctx->properties));
    }
    public function visitPropertyNameAndValueList(Context\PropertyNameAndValueListContext $ctx) {
        return array_reduce($ctx->pairs, function($acc, $pair) {
            [$key, $value] = $this->visit($pair);
            $acc[$key] = $value;
            return $acc;
        }, []);
    }
    public function visitPropertyNameAndValue(Context\PropertyNameAndValueContext $ctx) {
        return [$this->visit($ctx->name), $this->visit($ctx->value)];
    }
    public function visitPropertyName(Context\PropertyNameContext $ctx) {
        return match($ctx->val->getType()) {
            KELParser::NumericLiteral => floatval($ctx->getText()),
            KELParser::StringLiteral => stripcslashes(substr($ctx->getText(), 1, -1)),
            KELParser::Identifier => $ctx->getText(),
        };
    }
    public function visitLiteral(Context\LiteralContext $ctx) {
        return match($ctx->val->getType()) {
            KELParser::NullLiteral => new NullNode(),
            KELParser::BooleanLiteral => new BooleanLiteralNode('true' === $ctx->getText()),
            KELParser::NumericLiteral => new NumericLiteralNode(floatval($ctx->getText())),
            KELParser::StringLiteral => new StringLiteralNode(stripcslashes(substr($ctx->getText(), 1, -1))),
        };
    }
    public function visitArrayLiteral(Context\ArrayLiteralContext $ctx) {
        return new ArrayLiteralNode($this->visit($ctx->content));
    }
}
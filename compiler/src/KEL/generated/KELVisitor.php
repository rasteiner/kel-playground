<?php

/*
 * Generated from src/grammar/KEL.g4 by ANTLR 4.9
 */

namespace rasteiner\KEL\generated;

use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;

/**
 * This interface defines a complete generic visitor for a parse tree produced by {@see KELParser}.
 */
interface KELVisitor extends ParseTreeVisitor
{
	/**
	 * Visit a parse tree produced by {@see KELParser::arrayLiteral()}.
	 *
	 * @param Context\ArrayLiteralContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayLiteral(Context\ArrayLiteralContext $context);

	/**
	 * Visit a parse tree produced by {@see KELParser::objectLiteral()}.
	 *
	 * @param Context\ObjectLiteralContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitObjectLiteral(Context\ObjectLiteralContext $context);

	/**
	 * Visit a parse tree produced by {@see KELParser::propertyNameAndValueList()}.
	 *
	 * @param Context\PropertyNameAndValueListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPropertyNameAndValueList(Context\PropertyNameAndValueListContext $context);

	/**
	 * Visit a parse tree produced by {@see KELParser::propertyNameAndValue()}.
	 *
	 * @param Context\PropertyNameAndValueContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPropertyNameAndValue(Context\PropertyNameAndValueContext $context);

	/**
	 * Visit a parse tree produced by {@see KELParser::propertyName()}.
	 *
	 * @param Context\PropertyNameContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPropertyName(Context\PropertyNameContext $context);

	/**
	 * Visit a parse tree produced by {@see KELParser::expressionSequence()}.
	 *
	 * @param Context\ExpressionSequenceContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitExpressionSequence(Context\ExpressionSequenceContext $context);

	/**
	 * Visit a parse tree produced by {@see KELParser::matchList()}.
	 *
	 * @param Context\MatchListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMatchList(Context\MatchListContext $context);

	/**
	 * Visit a parse tree produced by {@see KELParser::matchEntry()}.
	 *
	 * @param Context\MatchEntryContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMatchEntry(Context\MatchEntryContext $context);

	/**
	 * Visit a parse tree produced by {@see KELParser::fallback()}.
	 *
	 * @param Context\FallbackContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFallback(Context\FallbackContext $context);

	/**
	 * Visit a parse tree produced by the `matchExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\MatchExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMatchExpression(Context\MatchExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `coalesceExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\CoalesceExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCoalesceExpression(Context\CoalesceExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `additiveExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\AdditiveExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAdditiveExpression(Context\AdditiveExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `subscriptExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\SubscriptExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitSubscriptExpression(Context\SubscriptExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `relationalExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\RelationalExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitRelationalExpression(Context\RelationalExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `objectLiteralExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\ObjectLiteralExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitObjectLiteralExpression(Context\ObjectLiteralExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `notExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\NotExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitNotExpression(Context\NotExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `multiplicativeExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\MultiplicativeExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMultiplicativeExpression(Context\MultiplicativeExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `memberExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\MemberExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMemberExpression(Context\MemberExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `unaryAddExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\UnaryAddExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitUnaryAddExpression(Context\UnaryAddExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `variableExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\VariableExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitVariableExpression(Context\VariableExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `orExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\OrExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitOrExpression(Context\OrExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `andExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\AndExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAndExpression(Context\AndExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `arrayLiteralExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\ArrayLiteralExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayLiteralExpression(Context\ArrayLiteralExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `parenthesizedExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\ParenthesizedExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitParenthesizedExpression(Context\ParenthesizedExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `unarySubExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\UnarySubExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitUnarySubExpression(Context\UnarySubExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `equalityExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\EqualityExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitEqualityExpression(Context\EqualityExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `exponentiationExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\ExponentiationExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitExponentiationExpression(Context\ExponentiationExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `literalExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\LiteralExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLiteralExpression(Context\LiteralExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `ternaryExpression` labeled alternative
	 * in {@see KELParser::expression()}.
	 *
	 * @param Context\TernaryExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTernaryExpression(Context\TernaryExpressionContext $context);

	/**
	 * Visit a parse tree produced by {@see KELParser::identifierName()}.
	 *
	 * @param Context\IdentifierNameContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIdentifierName(Context\IdentifierNameContext $context);

	/**
	 * Visit a parse tree produced by {@see KELParser::literal()}.
	 *
	 * @param Context\LiteralContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLiteral(Context\LiteralContext $context);

	/**
	 * Visit a parse tree produced by {@see KELParser::data()}.
	 *
	 * @param Context\DataContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitData(Context\DataContext $context);
}
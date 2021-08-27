grammar KEL;

options {
    language = PHP;
}

arrayLiteral : '[' content=expressionSequence ']' ;
objectLiteral : '{' properties=propertyNameAndValueList '}' ;
propertyNameAndValueList : pairs+=propertyNameAndValue ( ',' pairs+=propertyNameAndValue )* ','? ;
propertyNameAndValue : name=propertyName ':' value=expression ;
propertyName 
    : val=NumericLiteral
    | val=Identifier
    | val=StringLiteral
    ;

expressionSequence : items+=expression ( ',' items+=expression )* ;

matchList: '{' entries+=matchEntry ( ',' entries+=matchEntry )* '}';
matchEntry 
    : left=expressionSequence '->' right = expression 
    | fallback '->' right = expression
    ;

fallback : 'default';

expression
    : left=expression '[' right=expression ']' #subscriptExpression
    | left=expression '.' right=identifierName #memberExpression
    | '!' right=expression #notExpression
    | '+' right=expression #unaryAddExpression
    | '-' right=expression #unarySubExpression
	| <assoc = right> base = expression '**' exponent = expression # exponentiationExpression
    | subject=expression '=>' right=matchList #matchExpression
    | left=expression op=('*' | '/' | '%') right=expression    # multiplicativeExpression
    | left=expression op=('+' | '-') right=expression    # additiveExpression
    | left=expression '??' right=expression #coalesceExpression
    | left=expression op=('<' | '>' | '<=' | '>=') right=expression #relationalExpression
    | left=expression op=('==' | '!=') right=expression #equalityExpression
    | left=expression '&&' right=expression #andExpression
    | left=expression '||' right=expression #orExpression
    | <assoc=right> condition=expression '?' whentrue=expression ':' whenfalse=expression #ternaryExpression
    | literal    # literalExpression
    | arrayLiteral    # arrayLiteralExpression
    | objectLiteral	# objectLiteralExpression
    | '(' inner=expression ')' #parenthesizedExpression
	| id=identifierName #variableExpression
    ;

identifierName
    : Identifier
    ;

literal
    : val=NullLiteral
	| val=BooleanLiteral
	| val=NumericLiteral
	| val=StringLiteral
    ;

data : Data;

// -------------- LEXER ------------------


Data: 'data';

NumericLiteral
    : DecimalLiteral
    ;

BooleanLiteral: 'true' | 'false';
NullLiteral: 'null';

StringLiteral
    :
	'"' DoubleStringCharacter* '"'
	| '\'' SingleStringCharacter* '\'';

fragment DecimalLiteral:
	DecimalIntegerLiteral '.' [0-9]+ ExponentPart?
	| '.' [0-9] [0-9_]* ExponentPart?
	| DecimalIntegerLiteral ExponentPart?;

Identifier: IdentifierStart IdentifierPart*;

WS: [ \t\n\r\f]+ -> skip;

DoubleStringCharacter
    : ~["\\\r\n]
    | '\\' EscapeSequence
    ;

SingleStringCharacter
    : ~['\\\r\n]
	| '\\' EscapeSequence
    ;

fragment EscapeSequence
    : ['"\\bfnrtv]
    ;

fragment DecimalIntegerLiteral: '0' | [1-9] [0-9_]*;
fragment ExponentPart: [eE] [+-]? [0-9_]+;

fragment IdentifierPart
    : IdentifierStart
    | [a-zA-Z0-9_$]
    ;

fragment IdentifierStart : [a-zA-Z_$] ;
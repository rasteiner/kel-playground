<?php

/*
 * Generated from src/grammar/KEL.g4 by ANTLR 4.9
 */

namespace rasteiner\KEL\generated {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class KELParser extends Parser
	{
		public const T__0 = 1, T__1 = 2, T__2 = 3, T__3 = 4, T__4 = 5, T__5 = 6, 
               T__6 = 7, T__7 = 8, T__8 = 9, T__9 = 10, T__10 = 11, T__11 = 12, 
               T__12 = 13, T__13 = 14, T__14 = 15, T__15 = 16, T__16 = 17, 
               T__17 = 18, T__18 = 19, T__19 = 20, T__20 = 21, T__21 = 22, 
               T__22 = 23, T__23 = 24, T__24 = 25, T__25 = 26, T__26 = 27, 
               T__27 = 28, T__28 = 29, Data = 30, NumericLiteral = 31, BooleanLiteral = 32, 
               NullLiteral = 33, StringLiteral = 34, Identifier = 35, WS = 36, 
               DoubleStringCharacter = 37, SingleStringCharacter = 38;

		public const RULE_arrayLiteral = 0, RULE_objectLiteral = 1, RULE_propertyNameAndValueList = 2, 
               RULE_propertyNameAndValue = 3, RULE_propertyName = 4, RULE_expressionSequence = 5, 
               RULE_matchList = 6, RULE_matchEntry = 7, RULE_fallback = 8, 
               RULE_expression = 9, RULE_identifierName = 10, RULE_literal = 11, 
               RULE_data = 12;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'arrayLiteral', 'objectLiteral', 'propertyNameAndValueList', 'propertyNameAndValue', 
			'propertyName', 'expressionSequence', 'matchList', 'matchEntry', 'fallback', 
			'expression', 'identifierName', 'literal', 'data'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'['", "']'", "'{'", "'}'", "','", "':'", "'->'", "'default'", 
		    "'.'", "'!'", "'+'", "'-'", "'**'", "'=>'", "'*'", "'/'", "'%'", "'??'", 
		    "'<'", "'>'", "'<='", "'>='", "'=='", "'!='", "'&&'", "'||'", "'?'", 
		    "'('", "')'", "'data'", null, null, "'null'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, "Data", "NumericLiteral", 
		    "BooleanLiteral", "NullLiteral", "StringLiteral", "Identifier", "WS", 
		    "DoubleStringCharacter", "SingleStringCharacter"
		];

		/**
		 * @var string
		 */
		private const SERIALIZED_ATN =
			"\u{3}\u{608B}\u{A72A}\u{8133}\u{B9ED}\u{417C}\u{3BE7}\u{7786}\u{5964}" .
		    "\u{3}\u{28}\u{A1}\u{4}\u{2}\u{9}\u{2}\u{4}\u{3}\u{9}\u{3}\u{4}\u{4}" .
		    "\u{9}\u{4}\u{4}\u{5}\u{9}\u{5}\u{4}\u{6}\u{9}\u{6}\u{4}\u{7}\u{9}" .
		    "\u{7}\u{4}\u{8}\u{9}\u{8}\u{4}\u{9}\u{9}\u{9}\u{4}\u{A}\u{9}\u{A}" .
		    "\u{4}\u{B}\u{9}\u{B}\u{4}\u{C}\u{9}\u{C}\u{4}\u{D}\u{9}\u{D}\u{4}" .
		    "\u{E}\u{9}\u{E}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{2}\u{3}\u{3}" .
		    "\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{3}\u{4}\u{3}\u{4}\u{3}\u{4}\u{7}" .
		    "\u{4}\u{28}\u{A}\u{4}\u{C}\u{4}\u{E}\u{4}\u{2B}\u{B}\u{4}\u{3}\u{4}" .
		    "\u{5}\u{4}\u{2E}\u{A}\u{4}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}\u{3}\u{5}" .
		    "\u{3}\u{6}\u{3}\u{6}\u{3}\u{6}\u{5}\u{6}\u{37}\u{A}\u{6}\u{3}\u{7}" .
		    "\u{3}\u{7}\u{3}\u{7}\u{7}\u{7}\u{3C}\u{A}\u{7}\u{C}\u{7}\u{E}\u{7}" .
		    "\u{3F}\u{B}\u{7}\u{3}\u{8}\u{3}\u{8}\u{3}\u{8}\u{3}\u{8}\u{7}\u{8}" .
		    "\u{45}\u{A}\u{8}\u{C}\u{8}\u{E}\u{8}\u{48}\u{B}\u{8}\u{3}\u{8}\u{3}" .
		    "\u{8}\u{3}\u{9}\u{3}\u{9}\u{3}\u{9}\u{3}\u{9}\u{3}\u{9}\u{3}\u{9}" .
		    "\u{3}\u{9}\u{3}\u{9}\u{5}\u{9}\u{54}\u{A}\u{9}\u{3}\u{A}\u{3}\u{A}" .
		    "\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}" .
		    "\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}" .
		    "\u{3}\u{B}\u{3}\u{B}\u{5}\u{B}\u{67}\u{A}\u{B}\u{3}\u{B}\u{3}\u{B}" .
		    "\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}" .
		    "\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}" .
		    "\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}" .
		    "\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}" .
		    "\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}" .
		    "\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}\u{3}\u{B}" .
		    "\u{7}\u{B}\u{92}\u{A}\u{B}\u{C}\u{B}\u{E}\u{B}\u{95}\u{B}\u{B}\u{3}" .
		    "\u{C}\u{3}\u{C}\u{3}\u{D}\u{3}\u{D}\u{3}\u{D}\u{3}\u{D}\u{5}\u{D}" .
		    "\u{9D}\u{A}\u{D}\u{3}\u{E}\u{3}\u{E}\u{3}\u{E}\u{2}\u{3}\u{14}\u{F}" .
		    "\u{2}\u{4}\u{6}\u{8}\u{A}\u{C}\u{E}\u{10}\u{12}\u{14}\u{16}\u{18}" .
		    "\u{1A}\u{2}\u{6}\u{3}\u{2}\u{11}\u{13}\u{3}\u{2}\u{D}\u{E}\u{3}\u{2}" .
		    "\u{15}\u{18}\u{3}\u{2}\u{19}\u{1A}\u{2}\u{B0}\u{2}\u{1C}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{4}\u{20}\u{3}\u{2}\u{2}\u{2}\u{6}\u{24}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{8}\u{2F}\u{3}\u{2}\u{2}\u{2}\u{A}\u{36}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{C}\u{38}\u{3}\u{2}\u{2}\u{2}\u{E}\u{40}\u{3}\u{2}\u{2}\u{2}\u{10}" .
		    "\u{53}\u{3}\u{2}\u{2}\u{2}\u{12}\u{55}\u{3}\u{2}\u{2}\u{2}\u{14}\u{66}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{16}\u{96}\u{3}\u{2}\u{2}\u{2}\u{18}\u{9C}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{1A}\u{9E}\u{3}\u{2}\u{2}\u{2}\u{1C}\u{1D}\u{7}\u{3}" .
		    "\u{2}\u{2}\u{1D}\u{1E}\u{5}\u{C}\u{7}\u{2}\u{1E}\u{1F}\u{7}\u{4}\u{2}" .
		    "\u{2}\u{1F}\u{3}\u{3}\u{2}\u{2}\u{2}\u{20}\u{21}\u{7}\u{5}\u{2}\u{2}" .
		    "\u{21}\u{22}\u{5}\u{6}\u{4}\u{2}\u{22}\u{23}\u{7}\u{6}\u{2}\u{2}\u{23}" .
		    "\u{5}\u{3}\u{2}\u{2}\u{2}\u{24}\u{29}\u{5}\u{8}\u{5}\u{2}\u{25}\u{26}" .
		    "\u{7}\u{7}\u{2}\u{2}\u{26}\u{28}\u{5}\u{8}\u{5}\u{2}\u{27}\u{25}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{28}\u{2B}\u{3}\u{2}\u{2}\u{2}\u{29}\u{27}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{29}\u{2A}\u{3}\u{2}\u{2}\u{2}\u{2A}\u{2D}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{2B}\u{29}\u{3}\u{2}\u{2}\u{2}\u{2C}\u{2E}\u{7}\u{7}\u{2}\u{2}" .
		    "\u{2D}\u{2C}\u{3}\u{2}\u{2}\u{2}\u{2D}\u{2E}\u{3}\u{2}\u{2}\u{2}\u{2E}" .
		    "\u{7}\u{3}\u{2}\u{2}\u{2}\u{2F}\u{30}\u{5}\u{A}\u{6}\u{2}\u{30}\u{31}" .
		    "\u{7}\u{8}\u{2}\u{2}\u{31}\u{32}\u{5}\u{14}\u{B}\u{2}\u{32}\u{9}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{33}\u{37}\u{7}\u{21}\u{2}\u{2}\u{34}\u{37}\u{7}" .
		    "\u{25}\u{2}\u{2}\u{35}\u{37}\u{7}\u{24}\u{2}\u{2}\u{36}\u{33}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{36}\u{34}\u{3}\u{2}\u{2}\u{2}\u{36}\u{35}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{37}\u{B}\u{3}\u{2}\u{2}\u{2}\u{38}\u{3D}\u{5}\u{14}\u{B}" .
		    "\u{2}\u{39}\u{3A}\u{7}\u{7}\u{2}\u{2}\u{3A}\u{3C}\u{5}\u{14}\u{B}" .
		    "\u{2}\u{3B}\u{39}\u{3}\u{2}\u{2}\u{2}\u{3C}\u{3F}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{3D}\u{3B}\u{3}\u{2}\u{2}\u{2}\u{3D}\u{3E}\u{3}\u{2}\u{2}\u{2}\u{3E}" .
		    "\u{D}\u{3}\u{2}\u{2}\u{2}\u{3F}\u{3D}\u{3}\u{2}\u{2}\u{2}\u{40}\u{41}" .
		    "\u{7}\u{5}\u{2}\u{2}\u{41}\u{46}\u{5}\u{10}\u{9}\u{2}\u{42}\u{43}" .
		    "\u{7}\u{7}\u{2}\u{2}\u{43}\u{45}\u{5}\u{10}\u{9}\u{2}\u{44}\u{42}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{45}\u{48}\u{3}\u{2}\u{2}\u{2}\u{46}\u{44}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{46}\u{47}\u{3}\u{2}\u{2}\u{2}\u{47}\u{49}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{48}\u{46}\u{3}\u{2}\u{2}\u{2}\u{49}\u{4A}\u{7}\u{6}\u{2}" .
		    "\u{2}\u{4A}\u{F}\u{3}\u{2}\u{2}\u{2}\u{4B}\u{4C}\u{5}\u{C}\u{7}\u{2}" .
		    "\u{4C}\u{4D}\u{7}\u{9}\u{2}\u{2}\u{4D}\u{4E}\u{5}\u{14}\u{B}\u{2}" .
		    "\u{4E}\u{54}\u{3}\u{2}\u{2}\u{2}\u{4F}\u{50}\u{5}\u{12}\u{A}\u{2}" .
		    "\u{50}\u{51}\u{7}\u{9}\u{2}\u{2}\u{51}\u{52}\u{5}\u{14}\u{B}\u{2}" .
		    "\u{52}\u{54}\u{3}\u{2}\u{2}\u{2}\u{53}\u{4B}\u{3}\u{2}\u{2}\u{2}\u{53}" .
		    "\u{4F}\u{3}\u{2}\u{2}\u{2}\u{54}\u{11}\u{3}\u{2}\u{2}\u{2}\u{55}\u{56}" .
		    "\u{7}\u{A}\u{2}\u{2}\u{56}\u{13}\u{3}\u{2}\u{2}\u{2}\u{57}\u{58}\u{8}" .
		    "\u{B}\u{1}\u{2}\u{58}\u{59}\u{7}\u{C}\u{2}\u{2}\u{59}\u{67}\u{5}\u{14}" .
		    "\u{B}\u{14}\u{5A}\u{5B}\u{7}\u{D}\u{2}\u{2}\u{5B}\u{67}\u{5}\u{14}" .
		    "\u{B}\u{13}\u{5C}\u{5D}\u{7}\u{E}\u{2}\u{2}\u{5D}\u{67}\u{5}\u{14}" .
		    "\u{B}\u{12}\u{5E}\u{67}\u{5}\u{18}\u{D}\u{2}\u{5F}\u{67}\u{5}\u{2}" .
		    "\u{2}\u{2}\u{60}\u{67}\u{5}\u{4}\u{3}\u{2}\u{61}\u{62}\u{7}\u{1E}" .
		    "\u{2}\u{2}\u{62}\u{63}\u{5}\u{14}\u{B}\u{2}\u{63}\u{64}\u{7}\u{1F}" .
		    "\u{2}\u{2}\u{64}\u{67}\u{3}\u{2}\u{2}\u{2}\u{65}\u{67}\u{5}\u{16}" .
		    "\u{C}\u{2}\u{66}\u{57}\u{3}\u{2}\u{2}\u{2}\u{66}\u{5A}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{66}\u{5C}\u{3}\u{2}\u{2}\u{2}\u{66}\u{5E}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{66}\u{5F}\u{3}\u{2}\u{2}\u{2}\u{66}\u{60}\u{3}\u{2}\u{2}\u{2}\u{66}" .
		    "\u{61}\u{3}\u{2}\u{2}\u{2}\u{66}\u{65}\u{3}\u{2}\u{2}\u{2}\u{67}\u{93}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{68}\u{69}\u{C}\u{11}\u{2}\u{2}\u{69}\u{6A}" .
		    "\u{7}\u{F}\u{2}\u{2}\u{6A}\u{92}\u{5}\u{14}\u{B}\u{11}\u{6B}\u{6C}" .
		    "\u{C}\u{F}\u{2}\u{2}\u{6C}\u{6D}\u{9}\u{2}\u{2}\u{2}\u{6D}\u{92}\u{5}" .
		    "\u{14}\u{B}\u{10}\u{6E}\u{6F}\u{C}\u{E}\u{2}\u{2}\u{6F}\u{70}\u{9}" .
		    "\u{3}\u{2}\u{2}\u{70}\u{92}\u{5}\u{14}\u{B}\u{F}\u{71}\u{72}\u{C}" .
		    "\u{D}\u{2}\u{2}\u{72}\u{73}\u{7}\u{14}\u{2}\u{2}\u{73}\u{92}\u{5}" .
		    "\u{14}\u{B}\u{E}\u{74}\u{75}\u{C}\u{C}\u{2}\u{2}\u{75}\u{76}\u{9}" .
		    "\u{4}\u{2}\u{2}\u{76}\u{92}\u{5}\u{14}\u{B}\u{D}\u{77}\u{78}\u{C}" .
		    "\u{B}\u{2}\u{2}\u{78}\u{79}\u{9}\u{5}\u{2}\u{2}\u{79}\u{92}\u{5}\u{14}" .
		    "\u{B}\u{C}\u{7A}\u{7B}\u{C}\u{A}\u{2}\u{2}\u{7B}\u{7C}\u{7}\u{1B}" .
		    "\u{2}\u{2}\u{7C}\u{92}\u{5}\u{14}\u{B}\u{B}\u{7D}\u{7E}\u{C}\u{9}" .
		    "\u{2}\u{2}\u{7E}\u{7F}\u{7}\u{1C}\u{2}\u{2}\u{7F}\u{92}\u{5}\u{14}" .
		    "\u{B}\u{A}\u{80}\u{81}\u{C}\u{8}\u{2}\u{2}\u{81}\u{82}\u{7}\u{1D}" .
		    "\u{2}\u{2}\u{82}\u{83}\u{5}\u{14}\u{B}\u{2}\u{83}\u{84}\u{7}\u{8}" .
		    "\u{2}\u{2}\u{84}\u{85}\u{5}\u{14}\u{B}\u{8}\u{85}\u{92}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{86}\u{87}\u{C}\u{16}\u{2}\u{2}\u{87}\u{88}\u{7}\u{3}" .
		    "\u{2}\u{2}\u{88}\u{89}\u{5}\u{14}\u{B}\u{2}\u{89}\u{8A}\u{7}\u{4}" .
		    "\u{2}\u{2}\u{8A}\u{92}\u{3}\u{2}\u{2}\u{2}\u{8B}\u{8C}\u{C}\u{15}" .
		    "\u{2}\u{2}\u{8C}\u{8D}\u{7}\u{B}\u{2}\u{2}\u{8D}\u{92}\u{5}\u{16}" .
		    "\u{C}\u{2}\u{8E}\u{8F}\u{C}\u{10}\u{2}\u{2}\u{8F}\u{90}\u{7}\u{10}" .
		    "\u{2}\u{2}\u{90}\u{92}\u{5}\u{E}\u{8}\u{2}\u{91}\u{68}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{91}\u{6B}\u{3}\u{2}\u{2}\u{2}\u{91}\u{6E}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{91}\u{71}\u{3}\u{2}\u{2}\u{2}\u{91}\u{74}\u{3}\u{2}\u{2}\u{2}\u{91}" .
		    "\u{77}\u{3}\u{2}\u{2}\u{2}\u{91}\u{7A}\u{3}\u{2}\u{2}\u{2}\u{91}\u{7D}" .
		    "\u{3}\u{2}\u{2}\u{2}\u{91}\u{80}\u{3}\u{2}\u{2}\u{2}\u{91}\u{86}\u{3}" .
		    "\u{2}\u{2}\u{2}\u{91}\u{8B}\u{3}\u{2}\u{2}\u{2}\u{91}\u{8E}\u{3}\u{2}" .
		    "\u{2}\u{2}\u{92}\u{95}\u{3}\u{2}\u{2}\u{2}\u{93}\u{91}\u{3}\u{2}\u{2}" .
		    "\u{2}\u{93}\u{94}\u{3}\u{2}\u{2}\u{2}\u{94}\u{15}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{95}\u{93}\u{3}\u{2}\u{2}\u{2}\u{96}\u{97}\u{7}\u{25}\u{2}\u{2}" .
		    "\u{97}\u{17}\u{3}\u{2}\u{2}\u{2}\u{98}\u{9D}\u{7}\u{23}\u{2}\u{2}" .
		    "\u{99}\u{9D}\u{7}\u{22}\u{2}\u{2}\u{9A}\u{9D}\u{7}\u{21}\u{2}\u{2}" .
		    "\u{9B}\u{9D}\u{7}\u{24}\u{2}\u{2}\u{9C}\u{98}\u{3}\u{2}\u{2}\u{2}" .
		    "\u{9C}\u{99}\u{3}\u{2}\u{2}\u{2}\u{9C}\u{9A}\u{3}\u{2}\u{2}\u{2}\u{9C}" .
		    "\u{9B}\u{3}\u{2}\u{2}\u{2}\u{9D}\u{19}\u{3}\u{2}\u{2}\u{2}\u{9E}\u{9F}" .
		    "\u{7}\u{20}\u{2}\u{2}\u{9F}\u{1B}\u{3}\u{2}\u{2}\u{2}\u{C}\u{29}\u{2D}" .
		    "\u{36}\u{3D}\u{46}\u{53}\u{66}\u{91}\u{93}\u{9C}";

		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize() : void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.9', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName() : string
		{
			return "KEL.g4";
		}

		public function getRuleNames() : array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN() : string
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN() : ATN
		{
			return self::$atn;
		}

		public function getVocabulary() : Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function arrayLiteral() : Context\ArrayLiteralContext
		{
		    $localContext = new Context\ArrayLiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_arrayLiteral);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(26);
		        $this->match(self::T__0);
		        $this->setState(27);
		        $localContext->content = $this->expressionSequence();
		        $this->setState(28);
		        $this->match(self::T__1);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function objectLiteral() : Context\ObjectLiteralContext
		{
		    $localContext = new Context\ObjectLiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_objectLiteral);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(30);
		        $this->match(self::T__2);
		        $this->setState(31);
		        $localContext->properties = $this->propertyNameAndValueList();
		        $this->setState(32);
		        $this->match(self::T__3);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function propertyNameAndValueList() : Context\PropertyNameAndValueListContext
		{
		    $localContext = new Context\PropertyNameAndValueListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_propertyNameAndValueList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(34);
		        $localContext->propertyNameAndValue = $this->propertyNameAndValue();
		        $localContext->pairs[] = $localContext->propertyNameAndValue;
		        $this->setState(39);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 0, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(35);
		        		$this->match(self::T__4);
		        		$this->setState(36);
		        		$localContext->propertyNameAndValue = $this->propertyNameAndValue();
		        		$localContext->pairs[] = $localContext->propertyNameAndValue; 
		        	}

		        	$this->setState(41);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 0, $this->ctx);
		        }
		        $this->setState(43);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__4) {
		        	$this->setState(42);
		        	$this->match(self::T__4);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function propertyNameAndValue() : Context\PropertyNameAndValueContext
		{
		    $localContext = new Context\PropertyNameAndValueContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_propertyNameAndValue);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(45);
		        $localContext->name = $this->propertyName();
		        $this->setState(46);
		        $this->match(self::T__5);
		        $this->setState(47);
		        $localContext->value = $this->recursiveExpression(0);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function propertyName() : Context\PropertyNameContext
		{
		    $localContext = new Context\PropertyNameContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_propertyName);

		    try {
		        $this->setState(52);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::NumericLiteral:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(49);
		            	$localContext->val = $this->match(self::NumericLiteral);
		            	break;

		            case self::Identifier:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(50);
		            	$localContext->val = $this->match(self::Identifier);
		            	break;

		            case self::StringLiteral:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(51);
		            	$localContext->val = $this->match(self::StringLiteral);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expressionSequence() : Context\ExpressionSequenceContext
		{
		    $localContext = new Context\ExpressionSequenceContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_expressionSequence);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(54);
		        $localContext->expression = $this->recursiveExpression(0);
		        $localContext->items[] = $localContext->expression;
		        $this->setState(59);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__4) {
		        	$this->setState(55);
		        	$this->match(self::T__4);
		        	$this->setState(56);
		        	$localContext->expression = $this->recursiveExpression(0);
		        	$localContext->items[] = $localContext->expression;
		        	$this->setState(61);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function matchList() : Context\MatchListContext
		{
		    $localContext = new Context\MatchListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_matchList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(62);
		        $this->match(self::T__2);
		        $this->setState(63);
		        $localContext->matchEntry = $this->matchEntry();
		        $localContext->entries[] = $localContext->matchEntry;
		        $this->setState(68);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__4) {
		        	$this->setState(64);
		        	$this->match(self::T__4);
		        	$this->setState(65);
		        	$localContext->matchEntry = $this->matchEntry();
		        	$localContext->entries[] = $localContext->matchEntry;
		        	$this->setState(70);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(71);
		        $this->match(self::T__3);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function matchEntry() : Context\MatchEntryContext
		{
		    $localContext = new Context\MatchEntryContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_matchEntry);

		    try {
		        $this->setState(81);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__0:
		            case self::T__2:
		            case self::T__9:
		            case self::T__10:
		            case self::T__11:
		            case self::T__27:
		            case self::NumericLiteral:
		            case self::BooleanLiteral:
		            case self::NullLiteral:
		            case self::StringLiteral:
		            case self::Identifier:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(73);
		            	$localContext->left = $this->expressionSequence();
		            	$this->setState(74);
		            	$this->match(self::T__6);
		            	$this->setState(75);
		            	$localContext->right = $this->recursiveExpression(0);
		            	break;

		            case self::T__7:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(77);
		            	$this->fallback();
		            	$this->setState(78);
		            	$this->match(self::T__6);
		            	$this->setState(79);
		            	$localContext->right = $this->recursiveExpression(0);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function fallback() : Context\FallbackContext
		{
		    $localContext = new Context\FallbackContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 16, self::RULE_fallback);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(83);
		        $this->match(self::T__7);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expression() : Context\ExpressionContext
		{
			return $this->recursiveExpression(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveExpression(int $precedence) : Context\ExpressionContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\ExpressionContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 18;
			$this->enterRecursionRule($localContext, 18, self::RULE_expression, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(100);
				$this->errorHandler->sync($this);

				switch ($this->input->LA(1)) {
				    case self::T__9:
				    	$localContext = new Context\NotExpressionContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;

				    	$this->setState(86);
				    	$this->match(self::T__9);
				    	$this->setState(87);
				    	$localContext->right = $this->recursiveExpression(18);
				    	break;

				    case self::T__10:
				    	$localContext = new Context\UnaryAddExpressionContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;
				    	$this->setState(88);
				    	$this->match(self::T__10);
				    	$this->setState(89);
				    	$localContext->right = $this->recursiveExpression(17);
				    	break;

				    case self::T__11:
				    	$localContext = new Context\UnarySubExpressionContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;
				    	$this->setState(90);
				    	$this->match(self::T__11);
				    	$this->setState(91);
				    	$localContext->right = $this->recursiveExpression(16);
				    	break;

				    case self::NumericLiteral:
				    case self::BooleanLiteral:
				    case self::NullLiteral:
				    case self::StringLiteral:
				    	$localContext = new Context\LiteralExpressionContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;
				    	$this->setState(92);
				    	$this->literal();
				    	break;

				    case self::T__0:
				    	$localContext = new Context\ArrayLiteralExpressionContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;
				    	$this->setState(93);
				    	$this->arrayLiteral();
				    	break;

				    case self::T__2:
				    	$localContext = new Context\ObjectLiteralExpressionContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;
				    	$this->setState(94);
				    	$this->objectLiteral();
				    	break;

				    case self::T__27:
				    	$localContext = new Context\ParenthesizedExpressionContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;
				    	$this->setState(95);
				    	$this->match(self::T__27);
				    	$this->setState(96);
				    	$localContext->inner = $this->recursiveExpression(0);
				    	$this->setState(97);
				    	$this->match(self::T__28);
				    	break;

				    case self::Identifier:
				    	$localContext = new Context\VariableExpressionContext($localContext);
				    	$this->ctx = $localContext;
				    	$previousContext = $localContext;
				    	$this->setState(99);
				    	$localContext->id = $this->identifierName();
				    	break;

				default:
					throw new NoViableAltException($this);
				}
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(145);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 8, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$this->setState(143);
						$this->errorHandler->sync($this);

						switch ($this->getInterpreter()->adaptivePredict($this->input, 7, $this->ctx)) {
							case 1:
							    $localContext = new Context\ExponentiationExpressionContext(new Context\ExpressionContext($parentContext, $parentState));
							    $localContext->base = $previousContext;

							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(102);

							    if (!($this->precpred($this->ctx, 15))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 15)");
							    }
							    $this->setState(103);
							    $this->match(self::T__12);
							    $this->setState(104);
							    $localContext->exponent = $this->recursiveExpression(15);
							break;

							case 2:
							    $localContext = new Context\MultiplicativeExpressionContext(new Context\ExpressionContext($parentContext, $parentState));
							    $localContext->left = $previousContext;

							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(105);

							    if (!($this->precpred($this->ctx, 13))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 13)");
							    }
							    $this->setState(106);

							    $localContext->op = $this->input->LT(1);
							    $_la = $this->input->LA(1);

							    if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & ((1 << self::T__14) | (1 << self::T__15) | (1 << self::T__16))) !== 0))) {
							    	    $localContext->op = $this->errorHandler->recoverInline($this);
							    } else {
							    	if ($this->input->LA(1) === Token::EOF) {
							    	    $this->matchedEOF = true;
							        }

							    	$this->errorHandler->reportMatch($this);
							    	$this->consume();
							    }
							    $this->setState(107);
							    $localContext->right = $this->recursiveExpression(14);
							break;

							case 3:
							    $localContext = new Context\AdditiveExpressionContext(new Context\ExpressionContext($parentContext, $parentState));
							    $localContext->left = $previousContext;

							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(108);

							    if (!($this->precpred($this->ctx, 12))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 12)");
							    }
							    $this->setState(109);

							    $localContext->op = $this->input->LT(1);
							    $_la = $this->input->LA(1);

							    if (!($_la === self::T__10 || $_la === self::T__11)) {
							    	    $localContext->op = $this->errorHandler->recoverInline($this);
							    } else {
							    	if ($this->input->LA(1) === Token::EOF) {
							    	    $this->matchedEOF = true;
							        }

							    	$this->errorHandler->reportMatch($this);
							    	$this->consume();
							    }
							    $this->setState(110);
							    $localContext->right = $this->recursiveExpression(13);
							break;

							case 4:
							    $localContext = new Context\CoalesceExpressionContext(new Context\ExpressionContext($parentContext, $parentState));
							    $localContext->left = $previousContext;

							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(111);

							    if (!($this->precpred($this->ctx, 11))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 11)");
							    }
							    $this->setState(112);
							    $this->match(self::T__17);
							    $this->setState(113);
							    $localContext->right = $this->recursiveExpression(12);
							break;

							case 5:
							    $localContext = new Context\RelationalExpressionContext(new Context\ExpressionContext($parentContext, $parentState));
							    $localContext->left = $previousContext;

							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(114);

							    if (!($this->precpred($this->ctx, 10))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 10)");
							    }
							    $this->setState(115);

							    $localContext->op = $this->input->LT(1);
							    $_la = $this->input->LA(1);

							    if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & ((1 << self::T__18) | (1 << self::T__19) | (1 << self::T__20) | (1 << self::T__21))) !== 0))) {
							    	    $localContext->op = $this->errorHandler->recoverInline($this);
							    } else {
							    	if ($this->input->LA(1) === Token::EOF) {
							    	    $this->matchedEOF = true;
							        }

							    	$this->errorHandler->reportMatch($this);
							    	$this->consume();
							    }
							    $this->setState(116);
							    $localContext->right = $this->recursiveExpression(11);
							break;

							case 6:
							    $localContext = new Context\EqualityExpressionContext(new Context\ExpressionContext($parentContext, $parentState));
							    $localContext->left = $previousContext;

							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(117);

							    if (!($this->precpred($this->ctx, 9))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 9)");
							    }
							    $this->setState(118);

							    $localContext->op = $this->input->LT(1);
							    $_la = $this->input->LA(1);

							    if (!($_la === self::T__22 || $_la === self::T__23)) {
							    	    $localContext->op = $this->errorHandler->recoverInline($this);
							    } else {
							    	if ($this->input->LA(1) === Token::EOF) {
							    	    $this->matchedEOF = true;
							        }

							    	$this->errorHandler->reportMatch($this);
							    	$this->consume();
							    }
							    $this->setState(119);
							    $localContext->right = $this->recursiveExpression(10);
							break;

							case 7:
							    $localContext = new Context\AndExpressionContext(new Context\ExpressionContext($parentContext, $parentState));
							    $localContext->left = $previousContext;

							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(120);

							    if (!($this->precpred($this->ctx, 8))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 8)");
							    }
							    $this->setState(121);
							    $this->match(self::T__24);
							    $this->setState(122);
							    $localContext->right = $this->recursiveExpression(9);
							break;

							case 8:
							    $localContext = new Context\OrExpressionContext(new Context\ExpressionContext($parentContext, $parentState));
							    $localContext->left = $previousContext;

							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(123);

							    if (!($this->precpred($this->ctx, 7))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 7)");
							    }
							    $this->setState(124);
							    $this->match(self::T__25);
							    $this->setState(125);
							    $localContext->right = $this->recursiveExpression(8);
							break;

							case 9:
							    $localContext = new Context\TernaryExpressionContext(new Context\ExpressionContext($parentContext, $parentState));
							    $localContext->condition = $previousContext;

							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(126);

							    if (!($this->precpred($this->ctx, 6))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 6)");
							    }
							    $this->setState(127);
							    $this->match(self::T__26);
							    $this->setState(128);
							    $localContext->whentrue = $this->recursiveExpression(0);
							    $this->setState(129);
							    $this->match(self::T__5);
							    $this->setState(130);
							    $localContext->whenfalse = $this->recursiveExpression(6);
							break;

							case 10:
							    $localContext = new Context\SubscriptExpressionContext(new Context\ExpressionContext($parentContext, $parentState));
							    $localContext->left = $previousContext;

							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(132);

							    if (!($this->precpred($this->ctx, 20))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 20)");
							    }
							    $this->setState(133);
							    $this->match(self::T__0);
							    $this->setState(134);
							    $localContext->right = $this->recursiveExpression(0);
							    $this->setState(135);
							    $this->match(self::T__1);
							break;

							case 11:
							    $localContext = new Context\MemberExpressionContext(new Context\ExpressionContext($parentContext, $parentState));
							    $localContext->left = $previousContext;

							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(137);

							    if (!($this->precpred($this->ctx, 19))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 19)");
							    }
							    $this->setState(138);
							    $this->match(self::T__8);
							    $this->setState(139);
							    $localContext->right = $this->identifierName();
							break;

							case 12:
							    $localContext = new Context\MatchExpressionContext(new Context\ExpressionContext($parentContext, $parentState));
							    $localContext->subject = $previousContext;

							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expression);
							    $this->setState(140);

							    if (!($this->precpred($this->ctx, 14))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 14)");
							    }
							    $this->setState(141);
							    $this->match(self::T__13);
							    $this->setState(142);
							    $localContext->right = $this->matchList();
							break;
						} 
					}

					$this->setState(147);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 8, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function identifierName() : Context\IdentifierNameContext
		{
		    $localContext = new Context\IdentifierNameContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 20, self::RULE_identifierName);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(148);
		        $this->match(self::Identifier);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function literal() : Context\LiteralContext
		{
		    $localContext = new Context\LiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 22, self::RULE_literal);

		    try {
		        $this->setState(154);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::NullLiteral:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(150);
		            	$localContext->val = $this->match(self::NullLiteral);
		            	break;

		            case self::BooleanLiteral:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(151);
		            	$localContext->val = $this->match(self::BooleanLiteral);
		            	break;

		            case self::NumericLiteral:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(152);
		            	$localContext->val = $this->match(self::NumericLiteral);
		            	break;

		            case self::StringLiteral:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(153);
		            	$localContext->val = $this->match(self::StringLiteral);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function data() : Context\DataContext
		{
		    $localContext = new Context\DataContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 24, self::RULE_data);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(156);
		        $this->match(self::Data);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		public function sempred(?RuleContext $localContext, int $ruleIndex, int $predicateIndex) : bool
		{
			switch ($ruleIndex) {
					case 9:
						return $this->sempredExpression($localContext, $predicateIndex);

				default:
					return true;
				}
		}

		private function sempredExpression(?Context\ExpressionContext $localContext, int $predicateIndex) : bool
		{
			switch ($predicateIndex) {
			    case 0:
			        return $this->precpred($this->ctx, 15);

			    case 1:
			        return $this->precpred($this->ctx, 13);

			    case 2:
			        return $this->precpred($this->ctx, 12);

			    case 3:
			        return $this->precpred($this->ctx, 11);

			    case 4:
			        return $this->precpred($this->ctx, 10);

			    case 5:
			        return $this->precpred($this->ctx, 9);

			    case 6:
			        return $this->precpred($this->ctx, 8);

			    case 7:
			        return $this->precpred($this->ctx, 7);

			    case 8:
			        return $this->precpred($this->ctx, 6);

			    case 9:
			        return $this->precpred($this->ctx, 20);

			    case 10:
			        return $this->precpred($this->ctx, 19);

			    case 11:
			        return $this->precpred($this->ctx, 14);
			}

			return true;
		}
	}
}

namespace rasteiner\KEL\generated\Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use rasteiner\KEL\generated\KELParser;
	use rasteiner\KEL\generated\KELVisitor;

	class ArrayLiteralContext extends ParserRuleContext
	{
		/**
		 * @var ExpressionSequenceContext|null $content
		 */
		public $content;

		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return KELParser::RULE_arrayLiteral;
	    }

	    public function expressionSequence() : ?ExpressionSequenceContext
	    {
	    	return $this->getTypedRuleContext(ExpressionSequenceContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitArrayLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ObjectLiteralContext extends ParserRuleContext
	{
		/**
		 * @var PropertyNameAndValueListContext|null $properties
		 */
		public $properties;

		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return KELParser::RULE_objectLiteral;
	    }

	    public function propertyNameAndValueList() : ?PropertyNameAndValueListContext
	    {
	    	return $this->getTypedRuleContext(PropertyNameAndValueListContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitObjectLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PropertyNameAndValueListContext extends ParserRuleContext
	{
		/**
		 * @var PropertyNameAndValueContext|null $propertyNameAndValue
		 */
		public $propertyNameAndValue;

		/**
		 * @var array<PropertyNameAndValueContext>|null $pairs
		 */
		public $pairs;

		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return KELParser::RULE_propertyNameAndValueList;
	    }

	    /**
	     * @return array<PropertyNameAndValueContext>|PropertyNameAndValueContext|null
	     */
	    public function propertyNameAndValue(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(PropertyNameAndValueContext::class);
	    	}

	        return $this->getTypedRuleContext(PropertyNameAndValueContext::class, $index);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitPropertyNameAndValueList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PropertyNameAndValueContext extends ParserRuleContext
	{
		/**
		 * @var PropertyNameContext|null $name
		 */
		public $name;

		/**
		 * @var ExpressionContext|null $value
		 */
		public $value;

		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return KELParser::RULE_propertyNameAndValue;
	    }

	    public function propertyName() : ?PropertyNameContext
	    {
	    	return $this->getTypedRuleContext(PropertyNameContext::class, 0);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitPropertyNameAndValue($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PropertyNameContext extends ParserRuleContext
	{
		/**
		 * @var Token|null $val
		 */
		public $val;

		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return KELParser::RULE_propertyName;
	    }

	    public function NumericLiteral() : ?TerminalNode
	    {
	        return $this->getToken(KELParser::NumericLiteral, 0);
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(KELParser::Identifier, 0);
	    }

	    public function StringLiteral() : ?TerminalNode
	    {
	        return $this->getToken(KELParser::StringLiteral, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitPropertyName($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExpressionSequenceContext extends ParserRuleContext
	{
		/**
		 * @var ExpressionContext|null $expression
		 */
		public $expression;

		/**
		 * @var array<ExpressionContext>|null $items
		 */
		public $items;

		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return KELParser::RULE_expressionSequence;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitExpressionSequence($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class MatchListContext extends ParserRuleContext
	{
		/**
		 * @var MatchEntryContext|null $matchEntry
		 */
		public $matchEntry;

		/**
		 * @var array<MatchEntryContext>|null $entries
		 */
		public $entries;

		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return KELParser::RULE_matchList;
	    }

	    /**
	     * @return array<MatchEntryContext>|MatchEntryContext|null
	     */
	    public function matchEntry(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(MatchEntryContext::class);
	    	}

	        return $this->getTypedRuleContext(MatchEntryContext::class, $index);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitMatchList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class MatchEntryContext extends ParserRuleContext
	{
		/**
		 * @var ExpressionSequenceContext|null $left
		 */
		public $left;

		/**
		 * @var ExpressionContext|null $right
		 */
		public $right;

		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return KELParser::RULE_matchEntry;
	    }

	    public function expressionSequence() : ?ExpressionSequenceContext
	    {
	    	return $this->getTypedRuleContext(ExpressionSequenceContext::class, 0);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function fallback() : ?FallbackContext
	    {
	    	return $this->getTypedRuleContext(FallbackContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitMatchEntry($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FallbackContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return KELParser::RULE_fallback;
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitFallback($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExpressionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return KELParser::RULE_expression;
	    }
	 
		public function copyFrom(ParserRuleContext $context) : void
		{
			parent::copyFrom($context);

		}
	}

	class MatchExpressionContext extends ExpressionContext
	{
		/**
		 * @var ExpressionContext|null $subject
		 */
		public $subject;

		/**
		 * @var MatchListContext|null $right
		 */
		public $right;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function matchList() : ?MatchListContext
	    {
	    	return $this->getTypedRuleContext(MatchListContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitMatchExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class CoalesceExpressionContext extends ExpressionContext
	{
		/**
		 * @var ExpressionContext|null $left
		 */
		public $left;

		/**
		 * @var ExpressionContext|null $right
		 */
		public $right;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitCoalesceExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class AdditiveExpressionContext extends ExpressionContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		/**
		 * @var ExpressionContext|null $left
		 */
		public $left;

		/**
		 * @var ExpressionContext|null $right
		 */
		public $right;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitAdditiveExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class SubscriptExpressionContext extends ExpressionContext
	{
		/**
		 * @var ExpressionContext|null $left
		 */
		public $left;

		/**
		 * @var ExpressionContext|null $right
		 */
		public $right;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitSubscriptExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class RelationalExpressionContext extends ExpressionContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		/**
		 * @var ExpressionContext|null $left
		 */
		public $left;

		/**
		 * @var ExpressionContext|null $right
		 */
		public $right;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitRelationalExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ObjectLiteralExpressionContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function objectLiteral() : ?ObjectLiteralContext
	    {
	    	return $this->getTypedRuleContext(ObjectLiteralContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitObjectLiteralExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class NotExpressionContext extends ExpressionContext
	{
		/**
		 * @var ExpressionContext|null $right
		 */
		public $right;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitNotExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class MultiplicativeExpressionContext extends ExpressionContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		/**
		 * @var ExpressionContext|null $left
		 */
		public $left;

		/**
		 * @var ExpressionContext|null $right
		 */
		public $right;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitMultiplicativeExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class MemberExpressionContext extends ExpressionContext
	{
		/**
		 * @var ExpressionContext|null $left
		 */
		public $left;

		/**
		 * @var IdentifierNameContext|null $right
		 */
		public $right;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function identifierName() : ?IdentifierNameContext
	    {
	    	return $this->getTypedRuleContext(IdentifierNameContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitMemberExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class UnaryAddExpressionContext extends ExpressionContext
	{
		/**
		 * @var ExpressionContext|null $right
		 */
		public $right;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitUnaryAddExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class VariableExpressionContext extends ExpressionContext
	{
		/**
		 * @var IdentifierNameContext|null $id
		 */
		public $id;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function identifierName() : ?IdentifierNameContext
	    {
	    	return $this->getTypedRuleContext(IdentifierNameContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitVariableExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class OrExpressionContext extends ExpressionContext
	{
		/**
		 * @var ExpressionContext|null $left
		 */
		public $left;

		/**
		 * @var ExpressionContext|null $right
		 */
		public $right;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitOrExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class AndExpressionContext extends ExpressionContext
	{
		/**
		 * @var ExpressionContext|null $left
		 */
		public $left;

		/**
		 * @var ExpressionContext|null $right
		 */
		public $right;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitAndExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ArrayLiteralExpressionContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function arrayLiteral() : ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitArrayLiteralExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ParenthesizedExpressionContext extends ExpressionContext
	{
		/**
		 * @var ExpressionContext|null $inner
		 */
		public $inner;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitParenthesizedExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class UnarySubExpressionContext extends ExpressionContext
	{
		/**
		 * @var ExpressionContext|null $right
		 */
		public $right;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression() : ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitUnarySubExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class EqualityExpressionContext extends ExpressionContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		/**
		 * @var ExpressionContext|null $left
		 */
		public $left;

		/**
		 * @var ExpressionContext|null $right
		 */
		public $right;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitEqualityExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ExponentiationExpressionContext extends ExpressionContext
	{
		/**
		 * @var ExpressionContext|null $base
		 */
		public $base;

		/**
		 * @var ExpressionContext|null $exponent
		 */
		public $exponent;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitExponentiationExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class LiteralExpressionContext extends ExpressionContext
	{
		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function literal() : ?LiteralContext
	    {
	    	return $this->getTypedRuleContext(LiteralContext::class, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitLiteralExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class TernaryExpressionContext extends ExpressionContext
	{
		/**
		 * @var ExpressionContext|null $condition
		 */
		public $condition;

		/**
		 * @var ExpressionContext|null $whentrue
		 */
		public $whentrue;

		/**
		 * @var ExpressionContext|null $whenfalse
		 */
		public $whenfalse;

		public function __construct(ExpressionContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitTernaryExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IdentifierNameContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return KELParser::RULE_identifierName;
	    }

	    public function Identifier() : ?TerminalNode
	    {
	        return $this->getToken(KELParser::Identifier, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitIdentifierName($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LiteralContext extends ParserRuleContext
	{
		/**
		 * @var Token|null $val
		 */
		public $val;

		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return KELParser::RULE_literal;
	    }

	    public function NullLiteral() : ?TerminalNode
	    {
	        return $this->getToken(KELParser::NullLiteral, 0);
	    }

	    public function BooleanLiteral() : ?TerminalNode
	    {
	        return $this->getToken(KELParser::BooleanLiteral, 0);
	    }

	    public function NumericLiteral() : ?TerminalNode
	    {
	        return $this->getToken(KELParser::NumericLiteral, 0);
	    }

	    public function StringLiteral() : ?TerminalNode
	    {
	        return $this->getToken(KELParser::StringLiteral, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class DataContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex() : int
		{
		    return KELParser::RULE_data;
	    }

	    public function Data() : ?TerminalNode
	    {
	        return $this->getToken(KELParser::Data, 0);
	    }

		public function accept(ParseTreeVisitor $visitor)
		{
			if ($visitor instanceof KELVisitor) {
			    return $visitor->visitData($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}
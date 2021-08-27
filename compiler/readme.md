This parser only generates an AST for "Kirby Expression Language", which is used by Kirby's "calculated" field plugin to live evaluate expressions in the panel.

## Usage example
The following example will evaluate the expression `1 + 2` and print the JSON encoded AST.

```php
use rasteiner\KEL\Compiler;

$parser = new Compiler();
$ast = $parser->parse('1+2');

echo json_encode($ast);
```


## Contribute
### AST Classes 
If you change the list of AST classes, you need to update the composer autoloader by running the following command:

```bash
composer dumpautoload -o
```

### Generate Parser Code
You need to have antlr4 installed.
The command to generate the parser code from the root directory is:

```bash
antlr4 -o src/KEL/generated -package "rasteiner\KEL\generated" -visitor -no-listener -Xexact-output-dir src/grammar/KEL.g4
```

### Run Tests
```bash
./vendor/bin/phpunit tests
```
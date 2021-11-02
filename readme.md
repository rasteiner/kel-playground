# KEL Playground

This is a playground for "KEL" (Kirby Expression Language). This is a monorepo, since none of this has been published to npm or packagist.

Feel free to fork and publish your own version of this. 
The plugin `k3-calculated-field` contained in this repo is just a proof of concept, you are encoraged to use it as a starting point for your own plugin.

Here's a [discord thread](https://discord.com/channels/525634039965679616/525638772591951882/875326130687705089).

## How to use

This requires composer and PHP 8.0.

### Install

Run this:

```bash
git clone https://github.com/rasteiner/kel-playground.git kel-playground
cd kel-playground
composer create-project getkirby/plainkit testkit
cd testkit
```

Open `testkit/composer.json` and add this:

```json
    "minimum-stability": "dev",
    "prefer-stable": true,
    "repositories": [
        {
            "type": "path",
            "url": "../compiler",
            "options": {
                "versions": {
                    "rasteiner/kel-compiler": "dev-master"
                }
            }
        },
        {
            "type": "path",
            "url": "../k3-calculated-field",
            "options": {
                "versions": {
                    "rasteiner/k3-calculated-field": "dev-master"
                }
            }
        }
    ],
```

Run:
```bash	
composer require rasteiner/k3-calculated-field:dev-master
```

Start your webserver and make sure it has access to all 3 folders (`testkit`, `compiler`, `k3-calculated-field`, those are symlinked into the `testkit`).

Install the Kirby panel. 

### Use the example plugin

Open `testkit/site/blueprints/pages/default.yml` and replace its content with this:

```yaml
title: Default Page
preset: page
fields:
  name:
    label: Name
    type: text

  calculated:
    label: Calculated
    query: >
      name.length => {
        0 -> "What's your name?",
        1,2 -> "Keep going...",
        default -> "Hello " + name + "!"
      }
```

Open the panel and go to the homepage. Enter a name, and the calculated field should be filled with the result.

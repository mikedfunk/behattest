Some example acceptance tests using Behat, Mink, Goutte, and Selenium 2.

## Installation

1. [Get Composer](http://getcomposer.org)
2. `php composer.phar install`
3. Get [Selenium](http://www.seleniumhq.org/). If you're on Mac you can just `brew install selenium-server-standalone`.
4. start selenium via `java -jar /path/to/selenium.jar` or if you installed via homebrew just do `selenium-server`
5. Ensure you have [Firefox](http://getfirefox.org) installed
6. Go to the root of the project and type `vendor/bin/behat`

## Setting up a behat test suite
1. `composer require behat/behat behat/mink behat/mink-extension behat/mink-selenium2-driver`
2. add [behat.yml mink boilerplate](https://github.com/mikedfunk/behattest/blob/master/behat.yml) to root or mink will not work
3. `vendor/bin/behat --init`
4. edit `features/bootstrap/FeatureContext.php`. Ensure the class `extends \Behat\MinkExtension\Context\MinkContext`.
4. create a feature `my-feature-name.feature` in `features/` using [gherkin syntax](http://docs.behat.org/en/latest/guides/1.gherkin.html)
5. add the feature functions to `features/bootstrap/FeatureContext.php` with `behat --append-snippets --dry-run`
6. use the [mink api](http://mink.behat.org/en/latest/guides/session.html) to complete each test
7. `behat` to run tests

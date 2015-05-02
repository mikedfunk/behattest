Some example acceptance tests using Behat, Mink, Goutte, and PhantomJS.

## Installation

1. [Get Composer](http://getcomposer.org)
2. `php composer.phar install`
3. Get [Node](http://www.nodejs.org/)
4. `npm install`
5. Start phantomjs for javascript tests with `node_modules/.bin/phantomjs --webdriver=8643`
6. Run tests with `vendor/bin/behat`

## Setting up a behat test suite
1. `composer require behat/behat behat/mink behat/mink-extension behat/mink-selenium2-driver`
2. add [behat.yml mink boilerplate](https://github.com/mikedfunk/behattest/blob/master/behat.yml) to root or mink will not work
3. `vendor/bin/behat --init`
4. Install phantomjs for javascript tests:
 1. `npm init` and enter a bunch
 2. `npm install --save-dev phantomjs`
 3. Start phantomjs running with `node_modules/.bin/phantomjs --webdriver=8643`
5. edit `features/bootstrap/FeatureContext.php`. Ensure the class `extends \Behat\MinkExtension\Context\MinkContext`.
6. create a feature `my-feature-name.feature` in `features/` using [gherkin syntax](http://docs.behat.org/en/latest/guides/1.gherkin.html)
7. add the feature functions to `features/bootstrap/FeatureContext.php` with `behat --append-snippets --dry-run`
8. use the [mink api](http://mink.behat.org/en/latest/guides/session.html) to complete each test
9. `vendor/bin/behat` to run tests
10. for javascript tests, add `@javascript` above the feature. With the `behat.yml` mentioned above it will use phantomjs if you have it running.

<?php
/**
 * behat feature context
 *
 * @package BehatTest
 * @license MIT License <http://opensource.org/licenses/mit-license.html>
 */

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 *
 * @author Michael Funk <mike@mikefunk.com>
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I am on the google homepage
     */
    public function iAmOnTheGoogleHomepage()
    {
        $this->iAmOnHomepage();
    }

    /**
     * @When I enter the search term :arg1
     */
    public function iEnterTheSearchTerm($arg1)
    {
        $this->getSession()->wait(100);
        // search input
        $this->fillField('q', $arg1);
        // you can also check for an element with javascript
        // $this->getSession()
        // ->wait(100, "document.getElementById('gbqfb').length");
        $this->getSession()->wait(100);
        // search button
        $this->pressButton('gbqfb');
    }

    /**
     * @Then I should see at least one result about :arg1
     */
    public function iShouldSeeAtLeastOneResultAbout($arg1)
    {
        $this->getSession()->wait(500);
        $this->assertPageContainsText($arg1);
    }

    /**
     * @Then I should be on the google search results page
     */
    public function iShouldBeOnTheGoogleSearchResultsPage()
    {
        $this->assertPageAddress('#q=pound+puppies');
    }
}

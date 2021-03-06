<?php

namespace Tests\Browser\Settings;

class Preferences extends \Tests\Browser\DuskTestCase
{
    public function testPreferences()
    {
        $this->browse(function ($browser) {
            $this->go('settings');

            $objects = $this->getObjects();

            $this->assertContains('sectionslist', $objects);

            $browser->assertVisible('#settings-menu li.preferences.selected');

            // Preferences actions
            $browser->with('#sections-table', function($browser) {
                $browser->assertSeeIn('tr.general', 'User Interface');
                $browser->assertSeeIn('tr.mailbox', 'Mailbox View');
                $browser->assertSeeIn('tr.mailview', 'Displaying Messages');
                $browser->assertSeeIn('tr.compose', 'Composing Messages');
                $browser->assertSeeIn('tr.addressbook', 'Contacts');
                $browser->assertSeeIn('tr.folders', 'Special Folders');
                $browser->assertSeeIn('tr.server', 'Server Settings');
            });
        });
    }
}

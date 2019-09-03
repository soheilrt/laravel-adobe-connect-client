<?php

namespace Soheilrt\AdobeConnectClient\Tests\Unit\Commands;

use Soheilrt\AdobeConnectClient\Client\Commands\ScoShortcuts;
use Soheilrt\AdobeConnectClient\Client\Entities\SCO;
use Soheilrt\AdobeConnectClient\Client\Exceptions\NoAccessException;

class ScoShortcutsTest extends TestCommandBase
{
    public function testInstanceOf()
    {
        $this->userLogin();

        $command = new ScoShortcuts();
        $command->setClient($this->client);

        $sco_shortcuts = $command->execute();
        foreach ($sco_shortcuts as $sco) {
            $this->assertInstanceOf(SCO::class, $sco);
        }
    }

    public function testNoAccess()
    {
        $this->userLogout();

        $command = new ScoShortcuts();
        $command->setClient($this->client);

        $this->expectException(NoAccessException::class);
        $command->execute();
    }

    public function testListAll()
    {
        $this->userLogin();

        $command = new ScoShortcuts();
        $command->setClient($this->client);

        $sco_shortcuts = $command->execute();

        $this->assertEquals(20, count($sco_shortcuts));

        $shortcuts_type = array_keys($sco_shortcuts);

        $shortcut1 = $sco_shortcuts[$shortcuts_type[0]];
        $shortcut2 = $sco_shortcuts[$shortcuts_type[1]];

        $this->assertInstanceOf(SCO::class, $shortcut1);
        $this->assertInstanceOf(SCO::class, $shortcut2);

        $this->assertEquals(1611766930, $shortcut1->getScoId());
        $this->assertEquals(1611766945, $shortcut2->sco_id);
    }

    public function testCheckShortcutTypeWithScoType()
    {
        $this->userLogin();

        $command = new ScoShortcuts();
        $command->setClient($this->client);

        foreach ($command->execute() as $shortcut_key => $sco) {
            $this->assertEquals($shortcut_key, $sco->type);
        }
    }
}

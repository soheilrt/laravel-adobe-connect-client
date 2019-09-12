<?php


namespace Soheilrt\AdobeConnectClient\Tests\Unit;


use DateTimeImmutable;
use Illuminate\Support\Facades\Cache;
use Psr\SimpleCache\InvalidArgumentException;
use Soheilrt\AdobeConnectClient\Facades\Client;
use Soheilrt\AdobeConnectClient\Facades\CommonInfo;
use Soheilrt\AdobeConnectClient\Facades\Permission;
use Soheilrt\AdobeConnectClient\Facades\Principal;
use Soheilrt\AdobeConnectClient\Facades\SCO;
use Soheilrt\AdobeConnectClient\Facades\SCORecord;
use Soheilrt\AdobeConnectClient\Tests\TestCase;

class AdobeConnectServiceProviderTest extends TestCase
{
    public function testScoFacade()
    {
        $sco = SCO::setDateBegin("");
        $this->assertInstanceOf(\Soheilrt\AdobeConnectClient\Client\Entities\SCO::class, $sco);
        $this->assertInstanceOf(DateTimeImmutable::class, $sco->date_begin);
    }

    public function testScoRecordFacade()
    {
        $record = SCORecord::setType("Test");
        $this->assertEquals("Test", $record->type);
    }

    public function testPrincipalFacade()
    {
        $principal = Principal::setType(\Soheilrt\AdobeConnectClient\Client\Entities\Principal::TYPE_USER);
        $this->assertEquals(\Soheilrt\AdobeConnectClient\Client\Entities\Principal::TYPE_USER, $principal->getType());
    }

    public function testPermissionFacade()
    {
        $permission = Permission::setPermissionId(12);
        $this->assertEquals(12, $permission->permission_id);
    }

    public function testCommonInfoFacade()
    {
        $info = CommonInfo::setLocal('en');
        $this->assertEquals("en", $info->local);
    }

    public function testClientSingleton()
    {
        Client::setSession("testSession");
        $this->assertEquals("testSession", Client::getSession());
    }

    public function test_client_root_facade()
    {
        $root=Client::getFacadeRoot();
        $this->assertInstanceOf(\Soheilrt\AdobeConnectClient\Client\Client::class,$root);
    }

    public function test_session_cache()
    {
        $session="sessionstring";
        $driver=config('adobeConnect.session-cache.driver');
        $key=config('adobeConnect.session-cache.key');
        Cache::store($driver)->put($key,$session,20);
        $this->assertEquals($session,Client::getSession());
    }

    /**
     * @test
     * @throws InvalidArgumentException
     */
    public function testCacheResetOnEmptyCache()
    {
        $driver = config('adobeConnect.session-cache.driver');
        $key = config('adobeConnect.session-cache.key');
        Cache::store($driver)->put($key, '', 20);
        $client=Client::getFacadeRoot();
        $this->assertFalse(Cache::store($driver)->has($key));
        $this->assertEmpty($client->getSession());
    }
}

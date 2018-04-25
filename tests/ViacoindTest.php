<?php

use Orchestra\Testbench\TestCase;
use Onurrr\Viacoin\Traits\Viacoind;
use Onurrr\Viacoin\Client as ViacoinClient;

class ViacoindTest extends TestCase
{
    use Viacoind;

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Onurrr\Viacoin\Providers\ServiceProvider::class,
        ];
    }

    /**
     * Get package aliases.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Viacoind' => 'Onurrr\Viacoin\Facades\Viacoind',
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('viacoind.user', 'testuser');
        $app['config']->set('viacoind.password', 'testpass');
    }

    /**
     * Test service provider.
     *
     * @return void
     */
    public function testServiceIsAvailable()
    {
        $this->assertTrue($this->app->bound('viacoind'));
    }

    /**
     * Test facade.
     *
     * @return void
     */
    public function testFacade()
    {
        $this->assertInstanceOf(ViacoinClient::class, \Viacoind::getFacadeRoot());
    }

    /**
     * Test helper.
     *
     * @return void
     */
    public function testHelper()
    {
        $this->assertInstanceOf(ViacoinClient::class, viacoind());
    }

    /**
     * Test trait.
     *
     * @return void
     */
    public function testTrait()
    {
        $this->assertInstanceOf(ViacoinClient::class, $this->viacoind());
    }

    /**
     * Test viacoin config.
     *
     * @return void
     */
    public function testConfig()
    {
        $config = viacoind()->getConfig();

        $this->assertEquals(
            config('viacoind.scheme'),
            $config['base_uri']->getScheme()
        );

        $this->assertEquals(
            config('viacoind.host'),
            $config['base_uri']->getHost()
        );

        $this->assertEquals(
            config('viacoind.port'),
            $config['base_uri']->getPort()
        );

        $this->assertEquals(config('viacoind.user'), $config['auth'][0]);
        $this->assertEquals(config('viacoind.password'), $config['auth'][1]);
    }
}

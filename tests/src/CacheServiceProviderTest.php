<?php
namespace tests;

use Pimple\Container as PimpleContainer;
use Germania\CacheServiceProvider\CacheServiceProvider;
use Psr\Cache\CacheItemPoolInterface;
use RandomLib\Generator;

class CacheServiceProviderTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider provideCtorData
     */
    public function testRandomStuff( $path, $lifetime)
    {
        $dic = new PimpleContainer;
        $dic->register( new CacheServiceProvider( $path, $lifetime) );

        $this->assertEquals( $lifetime, $dic['Cache.lifetime'] );

        if (is_null($path)):
            $path = sys_get_temp_dir();
        endif;
        $this->assertEquals( $path, $dic['Cache.directory'] );

        $this->assertInstanceOf( CacheItemPoolInterface::class, $dic['Cache.ItemPool'] );

    }


    public function provideCtorData()
    {
        return array(
            [ null, null ],
            [ "/tmp", 3600 ]
        );
    }
}

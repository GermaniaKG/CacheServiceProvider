<?php
namespace Germania\CacheServiceProvider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

use phpFastCache\CacheManager;

class CacheServiceProvider implements ServiceProviderInterface
{
    public $cache_lifetime;
    public $cache_dir;

    public function __construct($cache_dir = null, $cache_lifetime = 0)
    {
        $this->cache_dir = $cache_dir ?: sys_get_temp_dir();
        $this->cache_lifetime = (int) $cache_lifetime;
    }

    /**
     * @implements ServiceProviderInterface
     */
    public function register(Container $dic)
    {

        $dic['Cache.lifetime'] = function($dic) {
            return $this->cache_lifetime;
        };


        $dic['Cache.directory'] = function($dic) {
            return $this->cache_dir;
        };


        $dic['Cache.ItemPool'] = function($dic) {
            $cache_dir = $dic['Cache.directory'];

            if (!$cache_dir) {
                throw new \Exception("Cache directory not available: " . $cache_dir);
            }

            if (!is_writable( $cache_dir)) {
                throw new \Exception("Cache directory not writeable: $cache_dir");
            }

            return CacheManager::getInstance('files', [ "path" => $cache_dir ]);
        };


    }
}


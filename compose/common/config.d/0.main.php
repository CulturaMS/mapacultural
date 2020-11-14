<?php 
use MapasCulturais\i;

/*
    exemplo:
      - REDIS_CACHE=d0637-prd-mapacultural-redis
      - SESSIONS_SAVE_PATH=tcp://d0637-prd-mapacultural-redis:6379
*/

if (env('REDIS_CACHE', false)) {
    $redis = new \Redis();
    $redis->connect(env('REDIS_CACHE', false));
    $cache = new \Doctrine\Common\Cache\RedisCache;
    $cache->setRedis($redis);
    
    $redis = new \Redis();
    $redis->connect(env('REDIS_CACHE', false));
    $mscache = new \Doctrine\Common\Cache\RedisCache;
    $mscache->setRedis($redis);
} else {
    $cache = new \Doctrine\Common\Cache\ApcuCache;
    $mscache = new \Doctrine\Common\Cache\ApcuCache;
}

return [
    'app.cache' => $cache,
    'app.mscache' => $mscache,
    'app.siteName' => env('SITE_NAME', 'Mapa da Cultura Brasileira'),
    'app.siteDescription' => i::__("O Mapas Culturais é uma plataforma colaborativa que reúne informações sobre agentes, espaços, eventos, projetos culturais e oportunidades"),

    'themes.active' => env('ACTIVE_THEME', 'MatoGrossoSul'),

    'app.lcode' => env('APP_LCODE', 'pt_BR,es_ES'),

    'namespaces' => array(
        'MapasCulturais\Themes' => THEMES_PATH,
        'MapasCulturais\Themes\BaseV1' => THEMES_PATH . 'BaseV1/',
        'Subsite' => THEMES_PATH . 'Subsite/',
    ),

    'doctrine.database' => [
        'host'           => env('DB_HOST', 'db'),
        'dbname'         => env('DB_NAME', 'mapas'),
        'user'           => env('DB_USER', 'mapas'),
        'password'       => env('DB_PASS', 'mapas'),
        'server_version' => env('DB_VERSION', 10),
    ]
];
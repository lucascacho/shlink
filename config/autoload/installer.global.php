<?php

declare(strict_types=1);

namespace Shlinkio\Shlink\CLI;

use Shlinkio\Shlink\Installer\Config\Option;
use Shlinkio\Shlink\Installer\Util\InstallationCommand;

return [

    'installer' => [
        'enabled_options' => [
            Option\Server\RuntimeConfigOption::class,
            Option\Server\MemoryLimitConfigOption::class,
            Option\Server\LogsFormatConfigOption::class,
            Option\Database\DatabaseDriverConfigOption::class,
            Option\Database\DatabaseNameConfigOption::class,
            Option\Database\DatabaseHostConfigOption::class,
            Option\Database\DatabasePortConfigOption::class,
            Option\Database\DatabaseUserConfigOption::class,
            Option\Database\DatabasePasswordConfigOption::class,
            Option\Database\DatabaseUnixSocketConfigOption::class,
            Option\Database\DatabaseUseEncryptionConfigOption::class,
            Option\UrlShortener\ShortDomainHostConfigOption::class,
            Option\UrlShortener\ShortDomainSchemaConfigOption::class,
            Option\Redirect\BaseUrlRedirectConfigOption::class,
            Option\Redirect\InvalidShortUrlRedirectConfigOption::class,
            Option\Redirect\Regular404RedirectConfigOption::class,
            Option\Visit\VisitsThresholdConfigOption::class,
            Option\BasePathConfigOption::class,
            Option\TimezoneConfigOption::class,
            Option\Cache\CacheNamespaceConfigOption::class,
            Option\Redis\RedisServersConfigOption::class,
            Option\Redis\RedisSentinelServiceConfigOption::class,
            Option\Redis\RedisServersUserConfigOption::class,
            Option\Redis\RedisServersPasswordConfigOption::class,
            Option\Redis\RedisPubSubConfigOption::class,
            Option\UrlShortener\ShortCodeLengthOption::class,
            Option\Mercure\EnableMercureConfigOption::class,
            Option\Mercure\MercurePublicUrlConfigOption::class,
            Option\Mercure\MercureInternalUrlConfigOption::class,
            Option\Mercure\MercureJwtSecretConfigOption::class,
            Option\UrlShortener\GeoLiteLicenseKeyConfigOption::class,
            Option\UrlShortener\RedirectStatusCodeConfigOption::class,
            Option\UrlShortener\RedirectCacheLifeTimeConfigOption::class,
            Option\UrlShortener\RedirectCacheVisibilityConfigOption::class,
            Option\UrlShortener\AutoResolveTitlesConfigOption::class,
            Option\UrlShortener\ExtraPathModeConfigOption::class,
            Option\UrlShortener\EnableMultiSegmentSlugsConfigOption::class,
            Option\UrlShortener\EnableTrailingSlashConfigOption::class,
            Option\UrlShortener\ShortUrlModeConfigOption::class,
            Option\Robots\RobotsAllowAllShortUrlsConfigOption::class,
            Option\Robots\RobotsUserAgentsConfigOption::class,
            Option\Tracking\IpAnonymizationConfigOption::class,
            Option\Tracking\OrphanVisitsTrackingConfigOption::class,
            Option\Tracking\DisableTrackParamConfigOption::class,
            Option\Tracking\DisableTrackingFromConfigOption::class,
            Option\Tracking\DisableTrackingConfigOption::class,
            Option\Tracking\DisableIpTrackingConfigOption::class,
            Option\Tracking\DisableReferrerTrackingConfigOption::class,
            Option\Tracking\DisableUaTrackingConfigOption::class,
            Option\QrCode\DefaultSizeConfigOption::class,
            Option\QrCode\DefaultMarginConfigOption::class,
            Option\QrCode\DefaultFormatConfigOption::class,
            Option\QrCode\DefaultErrorCorrectionConfigOption::class,
            Option\QrCode\DefaultRoundBlockSizeConfigOption::class,
            Option\QrCode\DefaultColorConfigOption::class,
            Option\QrCode\DefaultBgColorConfigOption::class,
            Option\QrCode\DefaultLogoUrlConfigOption::class,
            Option\QrCode\EnabledForDisabledShortUrlsConfigOption::class,
            Option\RabbitMq\RabbitMqEnabledConfigOption::class,
            Option\RabbitMq\RabbitMqHostConfigOption::class,
            Option\RabbitMq\RabbitMqUseSslConfigOption::class,
            Option\RabbitMq\RabbitMqPortConfigOption::class,
            Option\RabbitMq\RabbitMqUserConfigOption::class,
            Option\RabbitMq\RabbitMqPasswordConfigOption::class,
            Option\RabbitMq\RabbitMqVhostConfigOption::class,
            Option\Matomo\MatomoEnabledConfigOption::class,
            Option\Matomo\MatomoBaseUrlConfigOption::class,
            Option\Matomo\MatomoSiteIdConfigOption::class,
            Option\Matomo\MatomoApiTokenConfigOption::class,
            Option\RealTimeUpdates\RealTimeUpdatesTopicsConfigOption::class,
            Option\Cors\CorsAllowOriginConfigOption::class,
            Option\Cors\CorsAllowCredentialsConfigOption::class,
            Option\Cors\CorsMaxAgeConfigOption::class,
            Option\TrustedProxiesConfigOption::class,
        ],

        'installation_commands' => [
            InstallationCommand::DB_CREATE_SCHEMA->value => [
                'command' => 'bin/cli ' . Command\Db\CreateDatabaseCommand::NAME,
            ],
            InstallationCommand::DB_MIGRATE->value => [
                'command' => 'bin/cli ' . Command\Db\MigrateDatabaseCommand::NAME,
            ],
            InstallationCommand::ORM_PROXIES->value => [
                'command' => 'bin/doctrine orm:generate-proxies',
            ],
            InstallationCommand::ORM_CLEAR_CACHE->value => [
                'command' => 'bin/doctrine orm:clear-cache:metadata',
            ],
            InstallationCommand::GEOLITE_DOWNLOAD_DB->value => [
                'command' => 'bin/cli ' . Command\Visit\DownloadGeoLiteDbCommand::NAME,
            ],
            InstallationCommand::API_KEY_GENERATE->value => [
                'command' => 'bin/cli ' . Command\Api\GenerateKeyCommand::NAME,
            ],
            InstallationCommand::API_KEY_CREATE->value => [
                'command' => 'bin/cli ' . Command\Api\InitialApiKeyCommand::NAME,
            ],
        ],
    ],

];

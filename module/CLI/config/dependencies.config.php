<?php

declare(strict_types=1);

namespace Shlinkio\Shlink\CLI;

use Laminas\ServiceManager\AbstractFactory\ConfigAbstractFactory;
use Laminas\ServiceManager\Factory\InvokableFactory;
use Shlinkio\Shlink\Common\Doctrine\NoDbNameConnectionFactory;
use Shlinkio\Shlink\Core\Config\Options\UrlShortenerOptions;
use Shlinkio\Shlink\Core\Domain\DomainService;
use Shlinkio\Shlink\Core\Geolocation\GeolocationDbUpdater;
use Shlinkio\Shlink\Core\Matomo;
use Shlinkio\Shlink\Core\RedirectRule\ShortUrlRedirectRuleService;
use Shlinkio\Shlink\Core\ShortUrl;
use Shlinkio\Shlink\Core\ShortUrl\Helper\ShortUrlStringifier;
use Shlinkio\Shlink\Core\Tag\TagService;
use Shlinkio\Shlink\Core\Visit;
use Shlinkio\Shlink\Installer\Factory\ProcessHelperFactory;
use Shlinkio\Shlink\Rest\Service\ApiKeyService;
use Symfony\Component\Console as SymfonyCli;
use Symfony\Component\Lock\LockFactory;
use Symfony\Component\Process\PhpExecutableFinder;

return [

    'dependencies' => [
        'factories' => [
            SymfonyCli\Application::class => Factory\ApplicationFactory::class,
            SymfonyCli\Helper\ProcessHelper::class => ProcessHelperFactory::class,
            PhpExecutableFinder::class => InvokableFactory::class,

            RedirectRule\RedirectRuleHandler::class => InvokableFactory::class,
            Util\ProcessRunner::class => ConfigAbstractFactory::class,

            ApiKey\RoleResolver::class => ConfigAbstractFactory::class,

            Command\ShortUrl\CreateShortUrlCommand::class => ConfigAbstractFactory::class,
            Command\ShortUrl\EditShortUrlCommand::class => ConfigAbstractFactory::class,
            Command\ShortUrl\ResolveUrlCommand::class => ConfigAbstractFactory::class,
            Command\ShortUrl\ListShortUrlsCommand::class => ConfigAbstractFactory::class,
            Command\ShortUrl\GetShortUrlVisitsCommand::class => ConfigAbstractFactory::class,
            Command\ShortUrl\DeleteShortUrlCommand::class => ConfigAbstractFactory::class,
            Command\ShortUrl\DeleteShortUrlVisitsCommand::class => ConfigAbstractFactory::class,
            Command\ShortUrl\DeleteExpiredShortUrlsCommand::class => ConfigAbstractFactory::class,

            Command\Visit\DownloadGeoLiteDbCommand::class => ConfigAbstractFactory::class,
            Command\Visit\LocateVisitsCommand::class => ConfigAbstractFactory::class,
            Command\Visit\GetOrphanVisitsCommand::class => ConfigAbstractFactory::class,
            Command\Visit\DeleteOrphanVisitsCommand::class => ConfigAbstractFactory::class,
            Command\Visit\GetNonOrphanVisitsCommand::class => ConfigAbstractFactory::class,

            Command\Api\GenerateKeyCommand::class => ConfigAbstractFactory::class,
            Command\Api\DisableKeyCommand::class => ConfigAbstractFactory::class,
            Command\Api\DeleteKeyCommand::class => ConfigAbstractFactory::class,
            Command\Api\ListKeysCommand::class => ConfigAbstractFactory::class,
            Command\Api\InitialApiKeyCommand::class => ConfigAbstractFactory::class,
            Command\Api\RenameApiKeyCommand::class => ConfigAbstractFactory::class,

            Command\Tag\ListTagsCommand::class => ConfigAbstractFactory::class,
            Command\Tag\RenameTagCommand::class => ConfigAbstractFactory::class,
            Command\Tag\DeleteTagsCommand::class => ConfigAbstractFactory::class,
            Command\Tag\GetTagVisitsCommand::class => ConfigAbstractFactory::class,

            Command\Db\CreateDatabaseCommand::class => ConfigAbstractFactory::class,
            Command\Db\MigrateDatabaseCommand::class => ConfigAbstractFactory::class,

            Command\Domain\ListDomainsCommand::class => ConfigAbstractFactory::class,
            Command\Domain\DomainRedirectsCommand::class => ConfigAbstractFactory::class,
            Command\Domain\GetDomainVisitsCommand::class => ConfigAbstractFactory::class,

            Command\RedirectRule\ManageRedirectRulesCommand::class => ConfigAbstractFactory::class,

            Command\Integration\MatomoSendVisitsCommand::class => ConfigAbstractFactory::class,

            Command\Config\ReadEnvVarCommand::class => InvokableFactory::class,
        ],
    ],

    ConfigAbstractFactory::class => [
        Util\ProcessRunner::class => [SymfonyCli\Helper\ProcessHelper::class],
        ApiKey\RoleResolver::class => [DomainService::class, UrlShortenerOptions::class],

        Command\ShortUrl\CreateShortUrlCommand::class => [
            ShortUrl\UrlShortener::class,
            ShortUrlStringifier::class,
            UrlShortenerOptions::class,
        ],
        Command\ShortUrl\EditShortUrlCommand::class => [ShortUrl\ShortUrlService::class, ShortUrlStringifier::class],
        Command\ShortUrl\ResolveUrlCommand::class => [ShortUrl\ShortUrlResolver::class],
        Command\ShortUrl\ListShortUrlsCommand::class => [
            ShortUrl\ShortUrlListService::class,
            ShortUrl\Transformer\ShortUrlDataTransformer::class,
        ],
        Command\ShortUrl\GetShortUrlVisitsCommand::class => [Visit\VisitsStatsHelper::class],
        Command\ShortUrl\DeleteShortUrlCommand::class => [ShortUrl\DeleteShortUrlService::class],
        Command\ShortUrl\DeleteShortUrlVisitsCommand::class => [ShortUrl\ShortUrlVisitsDeleter::class],
        Command\ShortUrl\DeleteExpiredShortUrlsCommand::class => [ShortUrl\DeleteShortUrlService::class],

        Command\Visit\DownloadGeoLiteDbCommand::class => [GeolocationDbUpdater::class],
        Command\Visit\LocateVisitsCommand::class => [
            Visit\Geolocation\VisitLocator::class,
            Visit\Geolocation\VisitToLocationHelper::class,
            LockFactory::class,
        ],
        Command\Visit\GetOrphanVisitsCommand::class => [Visit\VisitsStatsHelper::class],
        Command\Visit\DeleteOrphanVisitsCommand::class => [Visit\VisitsDeleter::class],
        Command\Visit\GetNonOrphanVisitsCommand::class => [Visit\VisitsStatsHelper::class, ShortUrlStringifier::class],

        Command\Api\GenerateKeyCommand::class => [ApiKeyService::class, ApiKey\RoleResolver::class],
        Command\Api\DisableKeyCommand::class => [ApiKeyService::class],
        Command\Api\DeleteKeyCommand::class => [ApiKeyService::class],
        Command\Api\ListKeysCommand::class => [ApiKeyService::class],
        Command\Api\InitialApiKeyCommand::class => [ApiKeyService::class],
        Command\Api\RenameApiKeyCommand::class => [ApiKeyService::class],

        Command\Tag\ListTagsCommand::class => [TagService::class],
        Command\Tag\RenameTagCommand::class => [TagService::class],
        Command\Tag\DeleteTagsCommand::class => [TagService::class],
        Command\Tag\GetTagVisitsCommand::class => [Visit\VisitsStatsHelper::class, ShortUrlStringifier::class],

        Command\Domain\ListDomainsCommand::class => [DomainService::class],
        Command\Domain\DomainRedirectsCommand::class => [DomainService::class],
        Command\Domain\GetDomainVisitsCommand::class => [Visit\VisitsStatsHelper::class, ShortUrlStringifier::class],

        Command\RedirectRule\ManageRedirectRulesCommand::class => [
            ShortUrl\ShortUrlResolver::class,
            ShortUrlRedirectRuleService::class,
            RedirectRule\RedirectRuleHandler::class,
        ],

        Command\Integration\MatomoSendVisitsCommand::class => [
            Matomo\MatomoOptions::class,
            Matomo\MatomoVisitSender::class,
        ],

        Command\Db\CreateDatabaseCommand::class => [
            LockFactory::class,
            Util\ProcessRunner::class,
            PhpExecutableFinder::class,
            'em',
            NoDbNameConnectionFactory::SERVICE_NAME,
        ],
        Command\Db\MigrateDatabaseCommand::class => [
            LockFactory::class,
            Util\ProcessRunner::class,
            PhpExecutableFinder::class,
        ],
    ],

];

<?php

declare(strict_types=1);

namespace Shlinkio\Shlink\CLI;

return [

    'cli' => [
        'commands' => [
            Command\ShortUrl\CreateShortUrlCommand::NAME => Command\ShortUrl\CreateShortUrlCommand::class,
            Command\ShortUrl\EditShortUrlCommand::NAME => Command\ShortUrl\EditShortUrlCommand::class,
            Command\ShortUrl\ResolveUrlCommand::NAME => Command\ShortUrl\ResolveUrlCommand::class,
            Command\ShortUrl\ListShortUrlsCommand::NAME => Command\ShortUrl\ListShortUrlsCommand::class,
            Command\ShortUrl\GetShortUrlVisitsCommand::NAME => Command\ShortUrl\GetShortUrlVisitsCommand::class,
            Command\ShortUrl\DeleteShortUrlCommand::NAME => Command\ShortUrl\DeleteShortUrlCommand::class,
            Command\ShortUrl\DeleteShortUrlVisitsCommand::NAME => Command\ShortUrl\DeleteShortUrlVisitsCommand::class,
            Command\ShortUrl\DeleteExpiredShortUrlsCommand::NAME =>
                Command\ShortUrl\DeleteExpiredShortUrlsCommand::class,

            Command\Visit\LocateVisitsCommand::NAME => Command\Visit\LocateVisitsCommand::class,
            Command\Visit\DownloadGeoLiteDbCommand::NAME => Command\Visit\DownloadGeoLiteDbCommand::class,
            Command\Visit\GetOrphanVisitsCommand::NAME => Command\Visit\GetOrphanVisitsCommand::class,
            Command\Visit\DeleteOrphanVisitsCommand::NAME => Command\Visit\DeleteOrphanVisitsCommand::class,
            Command\Visit\GetNonOrphanVisitsCommand::NAME => Command\Visit\GetNonOrphanVisitsCommand::class,

            Command\Api\GenerateKeyCommand::NAME => Command\Api\GenerateKeyCommand::class,
            Command\Api\DisableKeyCommand::NAME => Command\Api\DisableKeyCommand::class,
            Command\Api\DeleteKeyCommand::NAME => Command\Api\DeleteKeyCommand::class,
            Command\Api\ListKeysCommand::NAME => Command\Api\ListKeysCommand::class,
            Command\Api\InitialApiKeyCommand::NAME => Command\Api\InitialApiKeyCommand::class,
            Command\Api\RenameApiKeyCommand::NAME => Command\Api\RenameApiKeyCommand::class,

            Command\Tag\ListTagsCommand::NAME => Command\Tag\ListTagsCommand::class,
            Command\Tag\RenameTagCommand::NAME => Command\Tag\RenameTagCommand::class,
            Command\Tag\DeleteTagsCommand::NAME => Command\Tag\DeleteTagsCommand::class,
            Command\Tag\GetTagVisitsCommand::NAME => Command\Tag\GetTagVisitsCommand::class,

            Command\Domain\ListDomainsCommand::NAME => Command\Domain\ListDomainsCommand::class,
            Command\Domain\DomainRedirectsCommand::NAME => Command\Domain\DomainRedirectsCommand::class,
            Command\Domain\GetDomainVisitsCommand::NAME => Command\Domain\GetDomainVisitsCommand::class,

            Command\Db\CreateDatabaseCommand::NAME => Command\Db\CreateDatabaseCommand::class,
            Command\Db\MigrateDatabaseCommand::NAME => Command\Db\MigrateDatabaseCommand::class,

            Command\RedirectRule\ManageRedirectRulesCommand::NAME =>
                Command\RedirectRule\ManageRedirectRulesCommand::class,

            Command\Integration\MatomoSendVisitsCommand::NAME => Command\Integration\MatomoSendVisitsCommand::class,

            Command\Config\ReadEnvVarCommand::NAME => Command\Config\ReadEnvVarCommand::class,
        ],
    ],

];

<?php

declare(strict_types=1);

namespace App\Tests\Behat\Helper;

use App\Tests\Behat\Helper;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;

final class Doctrine extends Helper
{
    public const MARIADB_DATETIME_FORMAT = 'Y-m-d H:i:s.u';

    public function __construct(
        private readonly Connection $connection,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    public function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    /**
     * @return array<array<string, mixed>>
     */
    public function execute(string $sql): array
    {
        $result = $this
            ->connection
            ->executeQuery($sql)
        ;

        return $result->fetchAllAssociative();
    }

    public function save(object $object):void
    {
        $this->entityManager->persist($object);
        $this->entityManager->flush();
    }

    public function truncate(): void
    {
        $allMetadata = $this->entityManager->getMetadataFactory()->getAllMetadata();

        foreach ($allMetadata as $metadata) {
            if ($metadata->isEmbeddedClass) {
                continue;
            }

            if ($metadata->isMappedSuperclass) {
                continue;
            }

            $this->execute(
                $this->connection->getDatabasePlatform()->getTruncateTableSQL(
                    $metadata->getTableName(),
                ),
            );
        }
    }
}
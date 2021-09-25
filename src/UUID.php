<?php
/**
 * Project uuid-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/22/2021
 * Time: 18:06
 */

namespace nguyenanhung\Libraries\UUID;

use Ramsey\Uuid\UuidInterface;
use Ramsey\Uuid\Uuid as RamseyUuid;
use Ramsey\Uuid\Type\Hexadecimal;
use Ramsey\Uuid\Type\Integer as IntegerObject;

/**
 * Class UUID - Extend from Ramsey UUID
 *
 * @package   nguyenanhung\Libraries\UUID
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class UUID
{
    /**
     * Returns a version 1 (time-based) UUID from a host ID, sequence number,
     * and the current time
     *
     * @param Hexadecimal|int|string|null $node     A 48-bit number representing the
     *                                              hardware address; this number may be represented as an integer or a
     *                                              hexadecimal string
     * @param int                         $clockSeq A 14-bit number used to help avoid duplicates that
     *                                              could arise when the clock is set backwards in time or if the node ID
     *                                              changes
     *
     * @return UuidInterface A UuidInterface instance that represents a version 1 UUID
     */
    public static function v1($node = null, int $clockSeq = null): UuidInterface
    {
        return RamseyUuid::uuid1($node, $clockSeq);
    }

    /**
     * Returns a version 2 (DCE Security) UUID from a local domain, local
     * identifier, host ID, clock sequence, and the current time
     *
     * @param int                $localDomain     The local domain to use when generating bytes,
     *                                            according to DCE Security
     * @param IntegerObject|null $localIdentifier The local identifier for the
     *                                            given domain; this may be a UID or GID on POSIX systems, if the local
     *                                            domain is person or group, or it may be a site-defined identifier
     *                                            if the local domain is org
     * @param Hexadecimal|null   $node            A 48-bit number representing the hardware
     *                                            address
     * @param int|null           $clockSeq        A 14-bit number used to help avoid duplicates
     *                                            that could arise when the clock is set backwards in time or if the
     *                                            node ID changes (in a version 2 UUID, the lower 8 bits of this number
     *                                            are replaced with the domain).
     *
     * @return UuidInterface A UuidInterface instance that represents a version 2 UUID
     */
    public static function v2(int $localDomain, IntegerObject $localIdentifier = null, Hexadecimal $node = null, int $clockSeq = null): UuidInterface
    {
        return RamseyUuid::uuid2($localDomain, $localIdentifier, $node, $clockSeq);
    }

    /**
     * Returns a version 3 (name-based) UUID based on the MD5 hash of a
     * namespace ID and a name
     *
     * @param string|UuidInterface $ns   The namespace (must be a valid UUID)
     * @param string               $name The name to use for creating a UUID
     *
     * @return UuidInterface A UuidInterface instance that represents a version 3 UUID
     *
     * @psalm-suppress ImpureMethodCall we know that the factory being replaced can lead to massive
     *                                  havoc across all consumers: that should never happen, and
     *                                  is generally to be discouraged. Until the factory is kept
     *                                  un-replaced, this method is effectively pure.
     *
     * @psalm-pure     note: changing the internal factory is an edge case not covered by purity invariants,
     *             but under constant factory setups, this method operates in functionally pure manners
     */
    public static function v3($ns, string $name): UuidInterface
    {
        return RamseyUuid::uuid3($ns, $name);
    }

    /**
     * Returns a version 4 (random) UUID
     *
     * @return UuidInterface A UuidInterface instance that represents a version 4 UUID
     */
    public static function v4(): UuidInterface
    {
        return RamseyUuid::uuid4();
    }

    /**
     * Returns a version 5 (name-based) UUID based on the SHA-1 hash of a
     * namespace ID and a name
     *
     * @param string|UuidInterface $ns   The namespace (must be a valid UUID)
     * @param string               $name The name to use for creating a UUID
     *
     * @return UuidInterface A UuidInterface instance that represents a version 5 UUID
     *
     * @psalm-pure     note: changing the internal factory is an edge case not covered by purity invariants,
     *             but under constant factory setups, this method operates in functionally pure manners
     *
     * @psalm-suppress ImpureMethodCall we know that the factory being replaced can lead to massive
     *                                  havoc across all consumers: that should never happen, and
     *                                  is generally to be discouraged. Until the factory is kept
     *                                  un-replaced, this method is effectively pure.
     */
    public static function v5($ns, string $name): UuidInterface
    {
        return RamseyUuid::uuid5($ns, $name);
    }

    /**
     * Returns a version 6 (ordered-time) UUID from a host ID, sequence number,
     * and the current time
     *
     * @param Hexadecimal|null $node     A 48-bit number representing the hardware
     *                                   address
     * @param int              $clockSeq A 14-bit number used to help avoid duplicates that
     *                                   could arise when the clock is set backwards in time or if the node ID
     *                                   changes
     *
     * @return UuidInterface A UuidInterface instance that represents a
     *     version 6 UUID
     */
    public static function v6(Hexadecimal $node = null, int $clockSeq = null): UuidInterface
    {
        return RamseyUuid::uuid6($node, $clockSeq);
    }

    /**
     * Returns true if the provided string is a valid UUID
     *
     * @param string $uuid A string to validate as a UUID
     *
     * @return bool True if the string is a valid UUID, false otherwise
     *
     * @psalm-pure note: changing the internal factory is an edge case not covered by purity invariants,
     *             but under constant factory setups, this method operates in functionally pure manners
     */
    public static function isValid(string $uuid): bool
    {
        return RamseyUuid::isValid($uuid);
    }
}

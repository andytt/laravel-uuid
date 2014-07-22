<?php namespace Andytt\Uuid;

use Rhumsaa\Uuid\Uuid as RUuid;

class Uuid
{
    /**
     * Get const NAMESPACE_* of RUuid.
     *
     * @param string $ns
     * @return string
     */
    public function getNamespace($ns = 'DNS')
    {
        switch ($ns) {
            case 'DNS':
            case 'dns':
                return RUuid::NAMESPACE_DNS;
                break;
            case 'URL':
            case 'url':
                return RUuid::NAMESPACE_URL;
                break;
            case 'OID':
            case 'oid':
                return RUuid::NAMESPACE_OID;
                break;
            case 'X500':
            case 'x500':
                return RUuid::NAMESPACE_X500;
                break;
        }

        return RUuid::NAMESPACE_DNS;
    }

    /**
     * Create instance of RUuid.
     *
     * @param integer|string $version
     * @param RUuid|string $ns The UUID namespace in which to create the named UUID
     * @param string $name The name to create a UUID for
     * @return RUuid|boolean RUuid if success, otherwise false
     */
    public function get($version = 4, $ns = 'DNS', $name = 'php.net')
    {
        switch ($version) {
            case 1:
                return RUuid::uuid1();
                break;
            case 3:
                return RUuid::uuid3(self::getNamespace($ns), $name);
                break;
            case 4:
                return RUuid::uuid4();
                break;
            case 5:
                return RUuid::uuid5(self::getNamespace($ns), $name);
                break;
            default:
                return false;
        }

        return false;
    }

    /**
     * Get uuid version.
     *
     * @param RUuid|string $uuid
     * @return integer|boolean
     */
    public function getVersion($uuid = '')
    {
        if (!RUuid::isValid($uuid)) {
            return false;
        }

        $version = RUuid::fromString($uuid)->getVersion();

        if (is_null($version)) {
            return false;
        }

        return $version;
    }

    /**
     * Check uuid version
     *
     * @param RUuid|string $uuid
     * @param integer $version
     * @return boolean
     */
    public function checkVersion($uuid = '', $version = 1)
    {
        if (!RUuid::isValid($uuid)) {
            return false;
        }

        return (RUuid::fromString($uuid)->getVersion() === $version) ? true : false;
    }
}


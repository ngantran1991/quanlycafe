<?php

namespace DoctrineExtensions\Types;

if (!class_exists('Zend_Date')) require_once 'Zend/Date.php';

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Type that maps an SQL DATETIME/TIMESTAMP to a Zend_Date object.
 *
 * @author Andreas Gallien <gallien@seleos.de>
 */
class ZendDateType extends Type
{
    const ZENDDATE = 'zenddate';

    public function getName()
    {
        return self::ZENDDATE;
    }

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getDateTimeTypeDeclarationSQL($fieldDeclaration);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return ($value !== null)
            ? $value->toString(\Zend_Locale_Format::convertPhpToIsoFormat(
                  $platform->getDateTimeFormatString()
              ))
            : null;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }

        $dateTimeFormatString = \Zend_Locale_Format::convertPhpToIsoFormat(
            $platform->getDateTimeFormatString()
        );

        $val = new \Zend_Date($value, $dateTimeFormatString);
        if (!$val) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }
        return $val;
    }
}

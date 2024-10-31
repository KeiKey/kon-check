<?php

namespace App\Enums;

class ArticleTypeEnum extends Enum
{
    const TEXT  = 'Text';
    const LINK  = 'Link';
    const AUDIO = 'Audio';
    const VIDEO = 'Video';

    /**
     * Return the default value.
     *
     * @return string
     */
    public static function default(): string
    {
        return self::TEXT;
    }
}

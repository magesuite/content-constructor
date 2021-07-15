<?php

namespace MageSuite\ContentConstructor\Service;

interface MediaResolver
{
    /**
     * Returns full path of image
     * @var $mediaPath string
     * @return mixed
     */
    public function resolve($mediaPath);

    /**
     * Returns srcset for specific image
     * @var $mediaPath string
     * @return mixed
     */
    public function resolveSrcSet($mediaPath);

    /**
     * Returns srcset as key value array
     * @param $array
     * @return mixed
     */
    public function resolveSrcSetArray($array);

    /**
     * Returns images paths from strings in array
     * @param $array
     * @return mixed
     */
    public function resolveInArray($array);
}

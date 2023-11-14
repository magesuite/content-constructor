<?php

namespace MageSuite\ContentConstructor;

interface AssetLocator
{
    /**
     * Sets base assets url.
     *
     * @param $url string
     * @return $this
     */
    public function setBaseUrl(string $url);

    /**
     * Sets base assets folder.
     *
     * @param $path string
     * @return $this
     */
    public function setBaseFolderPath(string $path);

    /**
     * Returns URL of an asset. If asset with specified id does not exists then it returns null.
     * @param $assetId string
     * @return string
     */
    public function getUrl(string $assetId);

    /**
     * Returns absolute path of an asset. If asset with specified id does not exists then it returns null.
     * @param $assetId string
     * @return string
     */
    public function getPath(string $assetId);
}

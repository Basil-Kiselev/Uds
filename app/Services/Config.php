<?php

namespace App\Services;

class UrlItem
{
    private string $url = "https://api.uds.app/partner/v2/goods";

    public function getUrl()
    {
        return $this->url;
    }
}

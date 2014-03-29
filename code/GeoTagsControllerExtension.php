<?php

class GeoTagsControllerExtension extends DataExtension {

    public function MetaTags(&$tags)
    {
        $page = $this->getOwner();
        $config = SiteConfig::current_site_config();

        if ($page->has_extension('GeoTagsExtension')) {
            $data = $page;
        } else if ($config->has_extension('GeoTagsExtension')) {
            $data = $config;
        }

        if ($data) {
            $region = '';
            if (strlen($data->GeoCountry)) {
                $region = $data->GeoCountry;
                if (strlen($data->GeoRegion)) {
                    $region .= '-' . $data->GeoRegion;
                }
            }

            if ($region) {
                $tags .= '<meta name="geo.region" content="' . $region . '" />';
            }

            if (strlen($data->GeoPlacename)) {
                $tags .= '<meta name="geo.placename" content="' . $data->GeoPlacename . '" />';
            }

            if (strlen($data->Latitude) && strlen($data->Longitude)) {
                $tags .= '<meta name="geo.position" content="' . $data->Latitude . ';' . $data->Longitude . '" />';
                $tags .= '<meta name="ICBM" content="' . $data->Latitude . ', ' . $data->Longitude . '" />';
            }
        }

        return $tags;
    }


}
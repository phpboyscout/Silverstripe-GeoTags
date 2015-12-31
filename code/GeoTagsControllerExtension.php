<?php

class GeoTagsControllerExtension extends DataExtension
{

    public function MetaTags(&$tags)
    {
        $page = $this->getOwner();
        $config = SiteConfig::current_site_config();

        while ($page && !$page->has_extension('GeoTagsExtension')) {
            if ($parent = $page->ParentID) {
                $page = SiteTree::get_by_id('SiteTree', $parent);
            } else {
                $page = false;
            }
        }

        if ($page) {
            $data = $page;
        } elseif ($config->has_extension('GeoTagsExtension')) {
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

            if (strlen($data->GeoLatitude) && strlen($data->GeoLongitude)) {
                $tags .= '<meta name="geo.position" content="' . $data->GeoLatitude . ';' . $data->GeoLongitude . '" />';
                $tags .= '<meta name="ICBM" content="' . $data->GeoLatitude . ', ' . $data->GeoLongitude . '" />';
            }
        }

        return $tags;
    }
}

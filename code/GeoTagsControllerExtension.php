<?php

class GeoTagsControllerExtension extends DataExtension {

    public function MetaTags(&$tags)
    {
        $page = $this->getOwner();
        if ($page->has_extension('GeoTagsExtension')) {
            if (strlen($page->GeoRegion)) {
                $tags .= '<meta name="geo.region" content="' . $page->GeoRegion . '" />';
            }
            if (strlen($page->GeoPlacename)) {
                $tags .= '<meta name="geo.placename" content="' . $page->GeoPlacename . '" />';
            }
            if (strlen($page->Latitude) && strlen($page->Longitude)) {
                $tags .= '<meta name="geo.position" content="' . $page->Latitude . ';' . $page->Longitude . '" />';
                $tags .= '<meta name="ICBM" content="' . $page->Latitude . ', ' . $page->Longitude . '" />';
            }
        } else if (SiteConfig::has_extension('GeoTagsExtension')) {

            $page = DataObject::get_one('SiteConfig');
            if (strlen($page->GeoRegion)) {
                $tags .= '<meta name="geo.region" content="' . $page->GeoRegion . '" />';
            }
            if (strlen($page->GeoPlacename)) {
                $tags .= '<meta name="geo.placename" content="' . $page->GeoPlacename . '" />';
            }
            if (strlen($page->Latitude) && strlen($page->Longitude)) {
                $tags .= '<meta name="geo.position" content="' . $page->Latitude . ';' . $page->Longitude . '" />';
                $tags .= '<meta name="ICBM" content="' . $page->Latitude . ', ' . $page->Longitude . '" />';
            }
        }

        return $tags;
    }


}
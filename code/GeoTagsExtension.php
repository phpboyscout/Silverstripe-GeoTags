<?php

class GeoTagsExtension extends DataExtension {

    private static $db = array(
        'GeoRegion' => 'varchar(30)',
        'GeoPlacename' => 'varchar(100)',
        'GeoLongitude' => 'varchar(30)',
        'GeoLatitude' => 'varchar(30)',
    );

    public function updateCMSFields(FieldList $fields) {

        $fields->addFieldsToTab(
            'Root.Geo',
            array(
                new TextField('GeoRegion', _t('GeoTags.GEOREGION', 'Region')),
                new TextField('GeoPlacename', _t('GeoTags.GEOPLACENAME', 'Placename')),
                new TextField('GeoLongitude', _t('GeoTags.GEOLONGITUDE', 'Longitude')),
                new TextField('GeoLatitude', _t('GeoTags.GEOLATITUDE', 'Latitude')),
            )
        );

        return $fields;
    }
}
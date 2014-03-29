<?php

class GeoTagsExtension extends DataExtension {

    private static $db = array(
        'GeoCountry' => 'varchar(30)',
        'GeoRegion' => 'varchar(30)',
        'GeoPlacename' => 'varchar(100)',
        'GeoLongitude' => 'varchar(30)',
        'GeoLatitude' => 'varchar(30)',
    );

    public function updateCMSFields(FieldList $fields) {

        $geoCountry = new CountryDropdownField('GeoCountry', _t('GeoTags.GEOCOUNTRY', 'Country'));
        $geoCountry->setRightTitle(_t(
            'GeoTags.GEOCOUNTY_HELP',
            'The Country of origin'
        ))->addExtraClass('help');

        $geoRegion = new TextField('GeoRegion', _t('GeoTags.GEOREGION', 'REGION'));
        $geoRegion->setRightTitle(_t(
            'GeoTags.GEOREGION_HELP',
            'The Region in the Country of origin. Must use appropriate iso3166 region code'
        ))->addExtraClass('help');

        $geoPlacename = new TextField('GeoPlacename', _t('GeoTags.GEOPLACENAME', 'Placename'));
        $geoPlacename->setRightTitle(_t(
            'GeoTags.GEOPLACENAME_HELP',
            'The Placename tag is provided primarily for resource recognition; it is anticipated that this field be harvested by automated agents and presented to the user in search engine results in a similar manner to the description META tag. This field is free-text, and typically would be used for city, county and state names. It could, however, be used for resource discovery'
        ))->addExtraClass('help');

        $geoLong = new TextField('GeoLongitude', _t('GeoTags.GEOLONGITUDE', 'Longitude'));
        $geoLong->setRightTitle(_t(
            'GeoTags.GEOLONGITUDE_HELP',
            'The Longitude for the location'
        ))->addExtraClass('help');

        $geoLat = new TextField('GeoLatitude', _t('GeoTags.GEOLATITUDE', 'Latitude'));
        $geoLat->setRightTitle(_t(
            'GeoTags.GEOLATITUDE_HELP',
            'The Latitude for the location'
        ))->addExtraClass('help');

        $fields->addFieldsToTab( 'Root.GeoTags',array(
            $geoCountry,
            $geoRegion,
            $geoPlacename,
            $geoLong,
            $geoLat
        ));

        return $fields;
    }
}
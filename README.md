Silverstripe-GeoTags
===========================

By default this provides the ability to specify site wide GeoTags by adding th e relevant Fields for Geo data to the Site Config.

It also provides the ability to add Page type specific Geo Data by adding the Extension to the appropriate Page type in you config.yml.

CustomPageType:
  extensions:
    - GeoTagsExtension

This extension used the built in ablity to extend the MetaTags method in the site Tree. If you subclass this method remember to make a call back to the parent.
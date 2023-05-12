<?php return array (
  'alexpechkarev/google-maps' => 
  array (
    'providers' => 
    array (
      0 => 'GoogleMaps\\ServiceProvider\\GoogleMapsServiceProvider',
    ),
    'aliases' => 
    array (
      'GoogleMaps' => 'GoogleMaps\\Facade\\GoogleMapsFacade',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'laravelcollective/html' => 
  array (
    'providers' => 
    array (
      0 => 'Collective\\Html\\HtmlServiceProvider',
    ),
    'aliases' => 
    array (
      'Form' => 'Collective\\Html\\FormFacade',
      'Html' => 'Collective\\Html\\HtmlFacade',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
);
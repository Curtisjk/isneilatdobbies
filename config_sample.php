<?php
  $config = array(
      'appId' => 'FB_APP_ID',
      'secret' => 'FB_APP_SECRET',
      'fileUpload' => false, // optional
      'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
    );

    $facebook = new Facebook($config);
    
    $dobbies_id = array(LOCATION_IDS;
    $lee_id = LEE_ID;
    $curtis_id = CURTIS_ID;
    $angela_id = ANGELEA_ID
    $user_profile = $facebook->api(
        '/NEIL_ID/feed/',
        'GET',
        array (
            'with' => 'location',
            'limit' => '1',
            'access_token' => 'ACCESS_TOKEN'
        )
    );
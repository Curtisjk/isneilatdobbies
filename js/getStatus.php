<?php
    require_once("php-sdk/facebook.php");

    $config = array(
      'appId' => '721161077918183',
      'secret' => '4f0a003aefdda928f1164a8469e292ca',
      'fileUpload' => false, // optional
      'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
    );

    $facebook = new Facebook($config);
    
    $dobbies_id = array(184967941630733,113996231998638);
    $lee_id = 562219401;
    $curtis_id = 844415622;
    $angela_id = 1295033231;
    $user_profile = $facebook->api(
        '/100001722188195/feed/',
        'GET',
        array (
            'with' => 'location',
            'limit' => '1',
            'access_token' => 'CAAKP5GXgCecBAMF95FGm6kdB9qiFHNMKINOasi6AT34909GYSwDsj5uvhVscXfIB14IMLqCTjr03ZAUKexWxxKw5titoz68SOm33Cs9RZACKYrORinqrEArpKxsnDY1DYwh4psr6DFPrxEfL25snXEeOXIwXL5AgZC12kSSYZBVxUGUZBbrRx'
        )
    );

    $positive = array(
        "He's here getting pissed right now.",
        "Yep, of course he is!",
        "He's around somewhere",
        "Yep, and it's your round!",
        "Yep, 2 Fosters and a Strongbow please Brian.",
        "He's just ordered a pint."
    );

    $lee = array(
        "Looks like it, He's probably beating Lee at snooker!",
    );

    $curtis = array(
        "Yep, and Curtis is here again too!"
    );

    $angela = array(
        ""
    );

    $negative = array(
        "Nope, not here at the moment.",
        "Nope, doesn't look like it.",
        "Wow, now thats a change, doesn't look like it.",
        "I've not seen him around recently."
    );

    $maybe = array(
        "Probably still here to be honest.",
        "It's probably around the time that money is lost on the Fruit Machine",
        "I've seen him here recently, could have moved on by now.",
        "He's probably still here somewhere, not sure he ever leaves",
        "It's getting late, probably about time he left"
    );

    $morning = array(
        "Doesn't look like it, but we will probably see him this afternoon.",
        "He's due around 4, check back later!"
    );

    $afternoon = array(
        "Not here yet, give it a few more hours.",
        "It's still early yet."
    );

    $evening = array(
        "Still not here, thats unusual.",
        "I'm as confused as you! Still not here."
    );

    $error = array(
        "Unfortunately, I'm not too sure at the moment :(.",
        "I can't seem to track him down at the moment."
    );

    $morningAfter = array(
        "Nope, but I saw him around last night.",
        "Not seen him this morning, hes probably feeling a bit rough."
    );
    

    function getStatus(){
        global $user_profile, $dobbies_id, $positive, $negative, $maybe, $morning, $afternoon, $evening, $lee_id, $lee, $curtis, $curtis_id, $angela, $angela_id, $error, $morningAfter;

        try {
            $lastCheckLocId = $user_profile["data"][0]["place"]["id"];
            $lastCheckDate = $user_profile["data"][0]["created_time"];
            $dateCheckIn = new DateTime($lastCheckDate);
            $dateNow = new DateTime('NOW');
            $timeAgo = $dateCheckIn->diff($dateNow);
            $dayOfWeek = intval(date('N'));
            $hourOfDay = intval(date('G'))-1;
            
            //debug statements
            //echo $dayOfWeek;
            //echo $hourOfDay;
            //var_dump($timeAgo);
            //echo($lastCheckLocId."<br/>");
            //echo $lastCheckDate;

            //more more than 0 years, 0 months, 0 days, and 6 hours and hes not here
            if($timeAgo->y > 0 || $timeAgo->m > 0 || $timeAgo->d > 0 || $timeAgo->h > 6 || !in_array($lastCheckLocId,$dobbies_id)){
                //negative 
                $merged = $negative;

                if($dayOfWeek==6 || $dayOfWeek==7){//if its saturday or sunday
                    if($hourOfDay < 12){//if its the morning
                        $merged = array_merge($merged,$morning);//add the morning strings
                    }elseif($hourOfDay < 16){//if its before 4pm
                        $merged = array_merge($merged,$afternoon);//add the afternoon strings
                    }elseif($hourOfDay >= 16){//if its 4pm or after
                        $merged = array_merge($merged,$evening);//add the evening strings
                    }   
                }elseif(($hourOfDay < 12) && ($hourOfDay > 4)) && timeAgo->h < 15){//if he was here in the last 15 hours, and its the morning
                    $merged = array_merge($merged,$morningAfter);//add the morning after strings
                }

                $index = rand(0,count($merged)-1);
                return $merged[$index];

            }elseif($timeAgo->h >= 3 && $timeAgo->h <= 6){//between 3 and 6 hours ago and hes probably here
                $index = rand(0,count($maybe)-1);
                return $maybe[$index];
            }elseif ($timeAgo->h <= 2) {//less than 3 hours and its definately here!
                $with = array();
                $with_tags = $user_profile["data"][0]["with_tags"]["data"];
                $merged = $positive;
                for($i = 0; $i < count($with_tags); $i++){
                    $with[$i] = $with_tags[0]["id"];
                }

                if(in_array($lee_id, $with)){//if lee is here add his stuff
                    $merged = array_merge($merged, $lee);
                }  

                if(in_array($curtis_id, $with)){//if curtis is here add his stuff
                    $merged = array_merge($merged, $curtis);
                }  

                if(in_array($angela_id, $with)){//if angela is here add his stuff
                    $merged = array_merge($merged, $angela);
                }  

                $index = rand(0,count($merged)-1);
                return $merged[$index];
            }
        } catch(Exception $e) {
            error_log($e->getType());
            error_log($e->getMessage());
            $index = rand(0,count($error)-1);
            return $error[$index];
        } 
    }
?>

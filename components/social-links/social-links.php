<?php

   
    /************* 
    // ** DG: Sample format from YOASTS Social boxes (Version 19.5.1 )
    // ** UI wise can only add Twitter & FB, others all fall under Other Social URLS (Note empty array items for backwards compat (linkedin_url))
    // ** Could extend by checking DB if LinkedIn or YouTube exists and update DB accordingly to old/new settings.
        
                // Array
                // (
                //     [facebook_site] => https://www.facebook.com/authenticity.digital
                //     [instagram_url] => 
                //     [linkedin_url] => 
                //     [myspace_url] => 
                //     [og_default_image] => 
                //     [og_default_image_id] => 
                //     [og_frontpage_title] => 
                //     [og_frontpage_desc] => 
                //     [og_frontpage_image] => 
                //     [og_frontpage_image_id] => 
                //     [opengraph] => 1
                //     [pinterest_url] => 
                //     [pinterestverify] => 
                //     [twitter] => 1
                //     [twitter_site] => authenticitydig
                //     [twitter_card_type] => summary_large_image
                //     [youtube_url] => 
                //     [wikipedia_url] => 
                //     [other_social_urls] => Array
                //         (
                //             [0] => https://www.linkedin.com/showcase/authenticity-dig/
                //             [1] => https://www.instagram.com/AuthenticityDig/
                //         )
                
                // )

    *************/


    // GET - data from SEO YOAST settings
    $social_data = get_option('wpseo_social');
 

     // ARRAY - Initial array of items to check against, left deprecated fields in for now. 
     // In this example we only replace the URL and all other items are set default by us

    $output_arr = array(
        'facebook_site' => array(
            'url' => '',
            'icon' => 'fa-facebook-f',
            'title' => 'Like us on Facebook'
        ),
        'linkedin_url' => array(
            'url' => '',
            'icon' => 'fa-linkedin-in',
            'title' => 'Follow us on Linkedin'
        ),
        'twitter_site' => array(
            'url' => '',
            'icon' => 'fa-twitter',
            'title' => 'Follow us on Twitter'
        ),
        'youtube_url' => array(
            'url' => '',
            'icon' => 'fa-youtube',
            'title' => 'Subscribe to us on YouTube'
        ),
        'instagram_url' => array(
            'url' => '',
            'icon' => 'fa-instagram',
            'title' => 'Follow us on Instagram'
        ),
        'other_social_urls' => array(
            'url' => '',
            'icon' => 'fa-instagram',
            'title' => 'Follow us on Instagram' 
        ),
    );


    

      // LOOP - check through our ARRAY as KEYS and VALUES
    foreach($output_arr as $k => $v){

        // FIX - catching twitter username and appending URL
        $prepend = '';
        if($k === 'twitter_site' && $social_data[$k])
            $prepend = 'https://twitter.com/';

        
        // DATA - Swap the URL in our ARRAY for the one from the social data
        if(is_array($social_data[$k])) {
            $output_arr[$k]['url'] = $prepend . implode('', $social_data[$k]);
        } else {
            $output_arr[$k]['url'] = $prepend . $social_data[$k];
        }



        // FIX - check inside Other Social Array
        if($k === 'other_social_urls') {

            // LOOP - through each as KEY and VALUE
            foreach($social_data[$k] as $k => $v){
                

                // IF - Value contains linkedin then update our array value accordingly.
                if(str_contains($v, 'linkedin')) {
                    $output_arr['linkedin_url']['url'] = $v;
                }

                // IF - Value contains instagram then update our array value accordingly.
                if(str_contains($v, 'instagram')) {
                    $output_arr['instagram_url']['url'] = $v;
                }

                // MISSING - YouTube

            }
        }
    }

    // FIX - Kill the other socials from the array (remove), dont need it in the output loop as we've pulled the URL's from it anyway.
    unset($output_arr["other_social_urls"]);


?>
 <ul class="social-media">
    <?php 
        foreach($output_arr as $item):
            if($item['url']):
            ?>
            <li><a href="<?php echo $item['url']; ?>" aria-label="social links" target="_blank" rel="noopener" title="<?php echo $item['title']; ?>"><i class="fab <?php echo $item['icon']; ?>"></i></a></li>
            <?php 
            endif;
        endforeach; 
    ?>
  </ul> 
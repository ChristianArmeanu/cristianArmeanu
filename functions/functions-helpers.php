<?php

    // Include SVG inline
    function theme_svg($file){
        $return_svg = '';
        if ( file_exists(STYLESHEETPATH . '/assets/img/' . $file . '.svg')){
            ob_start();
            include(STYLESHEETPATH . '/assets/img/' . $file . '.svg');
            $return_svg = ob_get_clean();
        }
        return $return_svg;
    }




    // check if link is external
    function externalLink($link){
        // returns bool val if link contains http and has home url
        // checks, doesn't contain home url and has http
        // true is _blanks, false is _self
        
        // order, check if home url in link, _self if 
        // check if link is then a http, presume going elsewhere _blank
        // default to _self if anything else

        if(strpos($link, get_home_url()) !== false){
            return false;
        } elseif(strpos($link, 'http') !== false) {
            return true;
        } else {
            return false;
        }
    }




    function includeComponent($slug, $echo = false, $args = array()){
        $returnComponent = '';
        $path = 'components/'.$slug.'/'.$slug.'.php';

        foreach($args as $k => $v){
            $$k = $v;
        }

        if ( file_exists(STYLESHEETPATH . '/'. $path)){
            ob_start();
            include(locate_template($path));
            $returnComponent = ob_get_clean();
        } else { $returnComponent = 'Component does not exist'; }
        
        if($echo)
            echo $returnComponent;
        else
            return $returnComponent;
    }



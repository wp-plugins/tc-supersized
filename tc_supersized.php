<?php

/*
Plugin Name: TC Supersized
Plugin URI: http://tutscode.com/article/tc-supersized-wordpress-plugin/
Description: Fullscreen background changer with dynamic transition based on supersized.js.
Author: Bayu Idham Fathurachman
Version: 0.1
Author URI: http://tutscode.com
*/

class TC_supersized{
    
    public $options;
    public $tc_speed=700;
    public $tc_transition=1;
    public $tc_interval=5000;
    
    public $tc_image1='https://sites.google.com/site/idhambayu/pujasera/images/background/1.jpg';
    public $tc_image2='https://sites.google.com/site/idhambayu/pujasera/images/background/2.jpg';
    public $tc_image3='https://sites.google.com/site/idhambayu/pujasera/images/background/3.jpg';
    public $tc_image4='https://sites.google.com/site/idhambayu/pujasera/images/background/4.jpg';
    public $tc_image5='https://sites.google.com/site/idhambayu/pujasera/images/background/5.jpg';
    public $tc_image6='https://sites.google.com/site/idhambayu/pujasera/images/background/6.jpg';
    public $tc_image7='https://sites.google.com/site/idhambayu/pujasera/images/background/7.jpg';
    public $tc_image8='https://sites.google.com/site/idhambayu/pujasera/images/background/8.jpg';
    public $tc_image9='https://sites.google.com/site/idhambayu/pujasera/images/background/9.jpg';
    public $tc_image10='https://sites.google.com/site/idhambayu/pujasera/images/background/10.jpg';
    
    public function __construct(){
        
        $this->options=get_option('tc_supersized_options');
        $this->tc_default_value();
        $this->register_supersized_options();
    }
    
    public function tc_remove_function(){
        delete_option('tc_supersized_options');
    }
    
    public function tc_default_value(){
        if(!isset($this->options['tc_transition_field'])){$this->options['tc_transition_field']=$this->tc_transition;}
        if(!isset($this->options['tc_speed_field'])){$this->options['tc_speed_field']=$this->tc_speed;}
        if(!isset($this->options['tc_interval_field'])){$this->options['tc_interval_field']=$this->tc_interval;}
        
        if(!isset($this->options['tc_image1'])){$this->options['tc_image1']=$this->tc_image1;}
        if(!isset($this->options['tc_image2'])){$this->options['tc_image2']=$this->tc_image2;}
        if(!isset($this->options['tc_image3'])){$this->options['tc_image3']=$this->tc_image3;}
        if(!isset($this->options['tc_image4'])){$this->options['tc_image4']=$this->tc_image4;}
        if(!isset($this->options['tc_image5'])){$this->options['tc_image5']=$this->tc_image5;}
        if(!isset($this->options['tc_image6'])){$this->options['tc_image6']=$this->tc_image6;}
        if(!isset($this->options['tc_image7'])){$this->options['tc_image7']=$this->tc_image7;}
        if(!isset($this->options['tc_image8'])){$this->options['tc_image8']=$this->tc_image8;}
        if(!isset($this->options['tc_image9'])){$this->options['tc_image9']=$this->tc_image9;}
        if(!isset($this->options['tc_image10'])){$this->options['tc_image10']=$this->tc_image10;}
    }
    
    public function add_menu_page(){
        add_options_page('TC Supersized Options', 'TC Supersized Options', 'administrator', __FILE__, array('TC_Supersized','display_options_page'));   
    }
    
    public function display_options_page(){   
         ?>
            <?php screen_icon(); ?>
            <h2>TC Supersized Options</h2>
            <form method="post" action="options.php" enctype="multipart/form-data">
                <?php settings_fields('tc_supersized_options'); ?>
                <?php do_settings_sections(__FILE__); ?>
                
                <p class="submit">
                    <input name="submit" type="submit" class="button-primary" value="Save Changes" />
                </p>
            </form><br/><br/>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
            ">
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
            </form>

            
           
            
        <?php    
    }
    
    public function register_supersized_options(){
        register_setting('tc_supersized_options','tc_supersized_options');
        add_settings_section('tc_supersized_section', 'Main Setting', array($this, 'tc_supersized_section_cb'), __FILE__);
        add_settings_field('tc_transition_field','Transition :',array($this, 'tc_transition_setting'),__FILE__,'tc_supersized_section');
        add_settings_field('tc_speed_field','Speed :',array($this, 'tc_speed_setting'),__FILE__,'tc_supersized_section');
        add_settings_field('tc_interval_field','Interval :',array($this, 'tc_interval_setting'),__FILE__,'tc_supersized_section');
        add_settings_field('tc_image1','Image 1 :',array($this, 'tc_image1_value'),__FILE__,'tc_supersized_section');
        add_settings_field('tc_image2','Image 2 :',array($this, 'tc_image2_value'),__FILE__,'tc_supersized_section');
        add_settings_field('tc_image3','Image 3 :',array($this, 'tc_image3_value'),__FILE__,'tc_supersized_section');
        add_settings_field('tc_image4','Image 4 :',array($this, 'tc_image4_value'),__FILE__,'tc_supersized_section');
        add_settings_field('tc_image5','Image 5 :',array($this, 'tc_image5_value'),__FILE__,'tc_supersized_section');
        add_settings_field('tc_image6','Image 6 :',array($this, 'tc_image6_value'),__FILE__,'tc_supersized_section');
        add_settings_field('tc_image7','Image 7 :',array($this, 'tc_image7_value'),__FILE__,'tc_supersized_section');
        add_settings_field('tc_image8','Image 8 :',array($this, 'tc_image8_value'),__FILE__,'tc_supersized_section');
        add_settings_field('tc_image9','Image 9 :',array($this, 'tc_image9_value'),__FILE__,'tc_supersized_section');
        add_settings_field('tc_image10','Image 10 :',array($this, 'tc_image10_value'),__FILE__,'tc_supersized_section');
    }
    
   
    public function tc_supersized_section_cb(){
        
    }
    
    public function tc_transition_setting(){
        $items=array(1,2,3,4,5,6,7);
        echo "<select name='tc_supersized_options[tc_transition_field]'>";
        foreach($items as $item){
            $selected=($this->options['tc_transition_field'] == $item) ? 'selected="selected"' : "";
            echo "<option value='$item' $selected>$item</option>";
        }
        echo "</select>";
    }
    
    public function tc_speed_setting(){
        echo "<input style='width:300px;' name='tc_supersized_options[tc_speed_field]' type='text' value='{$this->options['tc_speed_field']}' /><br/><br/>";
    }
    
    public function tc_interval_setting(){
        echo "<input style='width:300px;' name='tc_supersized_options[tc_interval_field]' type='text' value='{$this->options['tc_interval_field']}' /><br/><br/>";
    }
    
    public function tc_image1_value(){
        echo "<input style='width:300px;' name='tc_supersized_options[tc_image1]' type='text' value='{$this->options['tc_image1']}' /><br/><br/>";
        if(isset($this->options['tc_image1'])){
            echo "<img style='width:300px;height:175px;' src='{$this->options['tc_image1']}' alt='' />";    
        }
    }
    
    public function tc_image2_value(){
        echo "<input style='width:300px;' name='tc_supersized_options[tc_image2]' type='text' value='{$this->options['tc_image2']}' /><br/><br/>";
        if(isset($this->options['tc_image2'])){
            echo "<img style='width:300px;height:175px;' src='{$this->options['tc_image2']}' alt='' />";    
        }
    }
    public function tc_image3_value(){
        echo "<input style='width:300px;' name='tc_supersized_options[tc_image3]' type='text' value='{$this->options['tc_image3']}' /><br/><br/>";
        if(isset($this->options['tc_image3'])){
            echo "<img style='width:300px;height:175px;' src='{$this->options['tc_image3']}' alt='' />";    
        }
    }
    
    public function tc_image4_value(){
        echo "<input style='width:300px;' name='tc_supersized_options[tc_image4]' type='text' value='{$this->options['tc_image4']}' /><br/><br/>";
        if(isset($this->options['tc_image4'])){
            echo "<img style='width:300px;height:175px;' src='{$this->options['tc_image4']}' alt='' />";    
        }
    }
    
    public function tc_image5_value(){
        echo "<input style='width:300px;' name='tc_supersized_options[tc_image5]' type='text' value='{$this->options['tc_image5']}' /><br/><br/>";
        if(isset($this->options['tc_image5'])){
            echo "<img style='width:300px;height:175px;' src='{$this->options['tc_image5']}' alt='' />";    
        }
    }
    
    public function tc_image6_value(){
        echo "<input style='width:300px;' name='tc_supersized_options[tc_image6]' type='text' value='{$this->options['tc_image6']}' /><br/><br/>";
        if(isset($this->options['tc_image1'])){
            echo "<img style='width:300px;height:175px;' src='{$this->options['tc_image6']}' alt='' />";    
        }
    }
    
    public function tc_image7_value(){
        echo "<input style='width:300px;' name='tc_supersized_options[tc_image7]' type='text' value='{$this->options['tc_image7']}' /><br/><br/>";
        if(isset($this->options['tc_image7'])){
            echo "<img style='width:300px;height:175px;' src='{$this->options['tc_image7']}' alt='' />";    
        }
    }
    
    public function tc_image8_value(){
        echo "<input style='width:300px;' name='tc_supersized_options[tc_image8]' type='text' value='{$this->options['tc_image8']}' /><br/><br/>";
        if(isset($this->options['tc_image8'])){
            echo "<img style='width:300px;height:175px;' src='{$this->options['tc_image8']}' alt='' />";    
        }
    }
    
    public function tc_image9_value(){
        echo "<input style='width:300px;' name='tc_supersized_options[tc_image9]' type='text' value='{$this->options['tc_image9']}' /><br/><br/>";
        if(isset($this->options['tc_image9'])){
            echo "<img style='width:300px;height:175px;' src='{$this->options['tc_image9']}' alt='' />";    
        }
    }
    
    public function tc_image10_value(){
        echo "<input style='width:300px;' name='tc_supersized_options[tc_image10]' type='text' value='{$this->options['tc_image10']}' /><br/><br/>";
        if(isset($this->options['tc_image10'])){
            echo "<img style='width:300px;height:175px;' src='{$this->options['tc_image10']}' alt='' />";    
        }
    }
    
    
    
    public function register_js(){
        if(!is_admin()){
            wp_register_script('easing_js', get_option('siteurl').'/wp-content/plugins/TC_Supersized/js/jquery.easing.min.js', array('jquery'));
            wp_enqueue_script('easing_js');
            
            wp_register_script('supersized_js', get_option('siteurl').'/wp-content/plugins/TC_Supersized/js/supersized.3.2.6.min.js', array('jquery'));
            wp_enqueue_script('slider_js');
            
            wp_register_script('supersized_js', get_option('siteurl').'/wp-content/plugins/TC_Supersized/js/supersized.shutter.min.js', array('jquery'));
            wp_enqueue_script('supersized_js');
        }
    }
    
    public function register_css(){    
        if(!is_admin()){
            wp_enqueue_style( 'supersized_style', get_option('siteurl').'/wp-content/plugins/TC_Supersized/css/supersized.css');
            wp_enqueue_style( 'supersizedshutter_style', get_option('siteurl').'/wp-content/plugins/TC_Supersized/css/supersizedshutter.shutter.css');
        }
    }    
}

add_action('admin_menu', 'tc_supersized_menu');
function tc_supersized_menu(){
    TC_Supersized::add_menu_page();
}

add_action('admin_init', 'tc_supersized_register');
function tc_supersized_register(){
    new TC_Supersized();
}

add_action('init', 'register_resources');
function register_resources(){
    TC_Supersized::register_js();
    TC_supersized::register_css();   
}

register_deactivation_hook(__FILE__,'tc_deactivate');
function tc_deactivate(){
    TC_supersized::tc_remove_function();    
}

add_action('wp_head', 'show_supersized');
function show_supersized(){

    //default value
    $tc_default_image=array('https://sites.google.com/site/idhambayu/pujasera/images/background/1.jpg',
                            'https://sites.google.com/site/idhambayu/pujasera/images/background/2.jpg',
                            'https://sites.google.com/site/idhambayu/pujasera/images/background/3.jpg',
                            'https://sites.google.com/site/idhambayu/pujasera/images/background/4.jpg',
                            'https://sites.google.com/site/idhambayu/pujasera/images/background/5.jpg',
                            'https://sites.google.com/site/idhambayu/pujasera/images/background/6.jpg',
                            'https://sites.google.com/site/idhambayu/pujasera/images/background/7.jpg',
                            'https://sites.google.com/site/idhambayu/pujasera/images/background/8.jpg',
                            'https://sites.google.com/site/idhambayu/pujasera/images/background/9.jpg',
                            'https://sites.google.com/site/idhambayu/pujasera/images/background/10.jpg');
    
    $default_interval=5000;
    $default_transition=1;
    $default_speed=700;
    
    //extended value
    $tc_options=get_option('tc_supersized_options');
    $interval=$tc_options['tc_interval_field'];
    $transition=$tc_options['tc_transition_field'];
    $speed=$tc_options['tc_speed_field'];
    ?>
        <script type="text/javascript">
            jQuery(function($){
            $.supersized({
                // Functionality
                slide_interval      :   <?php if(!empty($interval)){echo $interval;}else{echo $default_interval;} ?>,// Length between transitions
                transition          :   <?php if(!empty($transition)){echo $transition;}else{echo $default_transition;} ?> , 	// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
                transition_speed    :   <?php if(!empty($speed)){echo $speed;}else{echo $default_speed;} ?>,// Speed of transition
                                                                                                   
                // Components							
                slide_links	    :	'blank',// Individual links for each slide (Options: false, 'num', 'name', 'blank')
                slides 		    :
                    [// Slideshow Images
                    <?php
                        if(!empty($tc_options)){
                            foreach($tc_options as $image_link){
                                if((getimagesize($image_link) !== false)){
                                    if($image_link != end($tc_options)){
                                        echo "{image : '$image_link'},"; 
                                    }else{
                                    echo "{image : '$image_link'}"; 
                                    }
                                }
                            };
                        }else{
                            foreach($tc_default_image as $image_default){
                                if((getimagesize($image_default) !== false)){
                                    if($image_default != end($tc_default_image)){
                                        echo "{image : '$image_default'},"; 
                                    }else{
                                    echo "{image : '$image_default'}"; 
                                    }
                                }    
                            }
                        }
                    ?>
                    ]
                });
            });

        </script>
    <?php

}


?>
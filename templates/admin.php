<?php 
$title = get_option("title");
?>

<div class="wrap postbox teste">
<h1> Simple Gallery Plugin </h1>
<br>
<h4> Shortcode: [simple_gallery_options]</h4>
 
<form method="post" action="options.php">

        <br>
        <h4> Check the boxes to customize your plugin<h4>
        <label>
                <input type="checkbox" value="1" id="title" name="title"
                <?php if($title == 1) echo 'checked' ?>/> Show Title on hover
        </label>
        
 
        <?php
	        settings_fields ( "simple_gallery_config" );
	        do_settings_sections ( "simple-gallery-settings" );
	        submit_button ();
	?>
    </form>
</div>
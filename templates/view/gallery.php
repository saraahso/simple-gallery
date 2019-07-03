<?php 
ob_start();

function simple_gallery_options() {

    $url = wp_remote_get('https://jsonplaceholder.typicode.com/photos');
    $gallery = json_decode( wp_remote_retrieve_body( $url ) );


    foreach( $gallery as $image ) {
        $thumbnailUrl = esc_url_raw( $image->url);
        $albumId = $image->albumId;
        $title = $image->title;
        
        if($image->id == "11"){
            break;
        }
    
	?>
    
        <div class="div-thumbnail">
            <img class="thumbnail" src="<?php echo $thumbnailUrl ?>"/>
            <span class="title">
            <?php  if(get_option( 'title')==1 ){
            echo $title;
            ?> </span>
        <?php } ?>
            </div>
    
   <?php 
    } 
    return ob_get_clean();
}

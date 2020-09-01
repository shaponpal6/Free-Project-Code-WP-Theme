<?php


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Adds a meta box to the post editing screen
 */
function prfx_custom_meta() {
    add_meta_box( 'prfx_meta', __( 'Free Project Code Download Link', 'prfx-textdomain' ), 'prfx_meta_callback2', 'post' );
}
add_action( 'add_meta_boxes', 'prfx_custom_meta' );



/**
 * Outputs the content of the meta box
 */
function prfx_meta_callback2( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
    ?>

    <p>
        <label for="meta-text" class="prfx-row-title"><?php _e( 'Download Link', 'prfx-textdomain' )?></label>
        <input type="text" name="meta-text" id="meta-text" class="regular-text" value="<?php if ( isset ( $prfx_stored_meta['meta-text'] ) ) echo $prfx_stored_meta['meta-text'][0]; ?>" />
    </p>

    <?php
}

/**
 * Saves the custom meta input
 */
function prfx_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'meta-text' ] ) ) {
        update_post_meta( $post_id, 'meta-text', sanitize_text_field( $_POST[ 'meta-text' ] ) );
    }

}
add_action( 'save_post', 'prfx_meta_save' );

/**
 * Display Data
 */
//function fpc_download_button($content) {
//    echo $content;
//    // Retrieves the stored value from the database
//    $meta_value = get_post_meta( get_the_ID(), 'meta-text', true );
//
//    // Checks and displays the retrieved value
//    if( !empty( $meta_value ) ) {
//
//        ?>
    <!--		<div class="container">-->
    <!--			<div class="row text-center">-->
    <!--				<h2>Download Project Here.</h2>-->
    <!--				<p><a href="--><?php //echo $meta_value;?><!--" class="btn btn-app-store"><i class="fa fa-apple"></i> <span class="small">Download on the</span> <span class="big">Project</span></a></p>-->
    <!--			</div>-->
    <!--		</div>-->
    <!--        --><?php
//        //return print $content.$meta_value;
//    }
//}
//add_filter( 'the_content', 'fpc_download_button' );
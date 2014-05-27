<?php

/**
 * Get the attachment id for the image src. 
 *
 * The image source does actually have to point to a legitimate url for an attachment img.
 * This can be any resized version of the image.
 *
 * You can additionally specify a thumbnail size, in which case this function will return the src url for that
 * image and not the image ID. It will NOT return the full <img> tag. Nor will it return the Wordpress array
 * with dimensions etc. It will only return the src itself.
 *
 *
 * @param $image_src
 * @param $thumb specify the thumbnail size you want to receive instead of the ID
 * @return mixed the attachment ID for the img src or the thumbnail url if $thumb is set or null if the attachment cannot be found
 */
function get_attachment_id_from_img_src($image_src, $thumbnail=null) {
    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
    if ( !( $attachment = $wpdb->get_var($query) ) ) {
        $image_src = preg_replace('/-[\dx]+(?=\.(jpg|jpeg|png|gif|pdf)$)/i', '', $image_src);
        $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
        $attachment = $wpdb->get_var($query);
    }
    if ( $thumbnail && $src = wp_get_attachment_image_src($attachment,$thumbnail)) {
        $attachment = $src[0];
    }
    return $attachment;
}

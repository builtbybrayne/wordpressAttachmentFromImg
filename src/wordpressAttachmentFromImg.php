<?php

/**
 * Get the attachment id for the image src. 
 *
 * The image source does actually have to point to a legitimate url for an attachment img.
 * This can be any resized version of the image.
 *
 *
 * @param $image_src
 * @return mixed the attachment if for the img src or null
 */
function get_attachment_id_from_img_src($image_src) {
    $image_src = preg_replace('/-[\dx]+(?=\.(jpg|jpeg|png|gif|pdf)$)/i', '', $image_src);
    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
    return $wpdb->get_var($query);
}
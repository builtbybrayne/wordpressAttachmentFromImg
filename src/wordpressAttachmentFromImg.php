<?php

function get_attachment_id_from_img_src($image_src) {
    $image_src = preg_replace('/-[\dx]+(?=\.(jpg|jpeg|png|gif|pdf)$)/i', '', $image_src);
    global $wpdb;
    $query = "SELECT ID FROM {$wpdb->posts} WHERE guid='$image_src'";
    return $wpdb->get_var($query);
}
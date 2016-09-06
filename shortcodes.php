<?php
/**
 * Shortcode definitions. Here you can define custom shortcodes.
 *
 * @package   WordPress
 * @subpackage  Zwaar Contrast Boilerplate
 * @since     Zwaar Contrast Boilerplate 1.0
 */

/* ========================================================================================================================
	
Example shortcode for galleries

======================================================================================================================== */

// add_shortcode('gallery', 'zwaarcontrast_gallery');
// function zwaarcontrast_gallery($array) {
//     if( !isset( $array['ids'] ) || empty($array['ids']) )
//       return false;

//   	$ids = explode(',', $array['ids']);
//     $idcount = count($ids);

//     $html = '<div class="content-gallery">';
//     $large_images = "";
//     $thumbnails = "";
//     foreach( $ids as $index=>$id ){
//         if( wp_attachment_is_image($id) ){
//         	$attributes_large = array('data-imageid' => $id, 'class'=>'content-gallery-large-image','alt'=>'Gallery large');
//         	$attributes_thumb = array('data-imageid' => $id, 'class'=>'content-gallery-small-image','alt'=>'Gallery small');

//             $attachment_large = wp_get_attachment_image($id, 'gallery_large',0,$attributes_large);
//             $attachment_thumb = wp_get_attachment_image($id, 'gallery_thumbnail',0,$attributes_thumb);

//             $large_images = $attachment_large.$large_images;

//             $thumb_class = 'content-gallery-small-item';
//             if($index % 3 === 0){
//             	$thumb_class .= ' first';
//             }
//             $thumbnails .= '<div class="'.$thumb_class.'">
// 								<a href="#" class="content-gallery-small-link">
// 									<div class="content-gallery-small-overlay"></div>
// 									'.$attachment_thumb.'
// 								</a>
// 							</div>';

//         }
//     }


//     $html.='<div class="content-gallery-large">'.$large_images.'</div>';
//     $html.='<div class="content-gallery-small-items clearfix">'.$thumbnails.'</div>';
//     $html .= "</div>";
//   return $html;
// }
?>
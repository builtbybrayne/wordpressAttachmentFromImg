wordpressAttachmentIdFromImg
============================

Single function to get wordpress attachment id from an img src, regardless of whether the img src is a resized thumbnail or the original image.

## Usage

### Installation

##### Via Composer

Neat_html is available on Packagist ([perchten/wordpress_attachmentfromimg](https://packagist.org/packages/perchten/wordpress_attachmentfromimg)) and as such is installable via [Composer](https://getcomposer.org/).

Add the following to your `composer.json`

	{
    	"require": {s
        	"perchten/wordpress_attachmentfromimg": "1.*"
	    }
	}

##### Direct include

Clone or download from [GitHub](https://github.com/perchten/wordpressAttachmentFromImg) and include directly in your code:

	require_once "path/to/neat_html.php"

### Code

Basic usage to get the ID:

	get_attachment_id_from_img_src($image_src)
	
If you want a specific thumbnail img src rather than just the ID, you can also use:

	get_attachment_id_from_img_src($image_src,$thumb)
	
This will only work if the thumbnail size has been previously defined. It will NOT return the `<img>` tag, but just the src url. It will also not return the image metadata such as size. If you need that, then use the inbuilt Wordpress function [`wp_get_attachment_image_src()`](http://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src) instead.
	
## Why Not A Wordpress Plugin?

Because it's tiny and only useful for developers. 

If you're a developer and unfamiliar with Composer, go [check it out](https://getcomposer.org/). You can use it to load utility libraries into your plugins or themes.
	


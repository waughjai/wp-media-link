<?php

declare( strict_types = 1 );
namespace WaughJ\WPMediaLink
{
	use WaughJ\HTMLLink\HTMLLink;
	use WaughJ\WPUploadImage\WPUploadImage;

	class WPMediaLink extends HTMLLink
	{
		public function __construct( int $id, $content )
		{
			$image = new WPUploadImage( $id, 'full' );
			parent::__construct( $image->getSource(), $content );
		}
	}
}

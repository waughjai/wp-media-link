<?php

require_once( 'vendor/waughj/wp-upload-image/tests/MockWordPress.php' );
use PHPUnit\Framework\TestCase;
use WaughJ\WPMediaLink\WPMediaLink;
use WaughJ\WPUploadImage\WPUploadImage;

class WPMediaLinkTest extends TestCase
{
	public function testBasicLink()
	{
		$link = new WPMediaLink( 1, "Click Here" );
		$this->assertStringContainsString( 'href="https://www.example.com/wp-content/uploads/2018/12/demo.png', $link->getHTML() );
		$this->assertStringContainsString( '">Click Here</a>', $link->getHTML() );
	}

	public function testLinkWithImage()
	{
		$link = new WPMediaLink( 1, new WPUploadImage( 1, 'responsive' ) );
		$this->assertStringContainsString( 'href="https://www.example.com/wp-content/uploads/2018/12/demo.png', $link->getHTML() );
		$this->assertStringContainsString( 'src="https://www.example.com/wp-content/uploads/2018/12/demo', $link->getHTML() );
		$this->assertStringContainsString( 'srcset="https://www.example.com/wp-content/uploads/2018/12/demo-150x150.png', $link->getHTML() );
	}

	public function testLinkWithAttributes()
	{
		$link = new WPMediaLink( 1, new WPUploadImage( 1, 'responsive' ), [ 'class' => 'center-img box' ] );
		$this->assertStringContainsString( 'href="https://www.example.com/wp-content/uploads/2018/12/demo.png', $link->getHTML() );
		$this->assertStringContainsString( 'src="https://www.example.com/wp-content/uploads/2018/12/demo', $link->getHTML() );
		$this->assertStringContainsString( 'srcset="https://www.example.com/wp-content/uploads/2018/12/demo-150x150.png', $link->getHTML() );
		$this->assertStringContainsString( 'class="center-img box"', $link->getHTML() );
	}
}

<?php

	function get_citate( $content ): string {
		if ( '' == $content ) {
			return '';
		}
		$dom = new DOMDocument( '1.0', 'utf-8' );
		libxml_use_internal_errors( true );

		$html = mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' );
		$dom->loadHTML( $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );
		$data   = $dom->getElementsByTagName( 'blockquote' )->item( 0 );
		$output = '';
		if ( null !== $data ) {
			// $author = $data->firstChild->nodeValue;
			$text = $data->lastChild->nodeValue;
			// $output = "<q>" . $author . "<br>" . $text . "</q>";
			$output = '<q>' . $text . '</q>';
		}
		unset( $dom );
		libxml_clear_errors();

		return $output;
	}

	function get_image_url( $content = '' ): string {

		$dom = new DOMDocument( '1.0', 'utf-8' );
		libxml_use_internal_errors( true );

		if ( '' === $content ) {
			$content = get_the_content();
		}

		$html = mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' );

		$dom->loadHTML( $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD );

		$images = $dom->getElementsByTagName( 'img' );
		$link   = '';

		if ( 0 !== $images->length ) {
			foreach ( $images as $image ) {
				$link = ( $image->getAttribute( 'src' ) );
				break;// only first image source.
			}
		}

		unset( $dom );
		libxml_clear_errors();

		return $link;
	}

<?php

/*

	Author:    https://github.com/AlexeyZ7
	Name:      php-img2ascii
	Version:   0.9
	Last edit: 02.11.2019

*/

if ( !extension_loaded('gd') )
{
	throw new Exception('[IMG2ASCII] \'GD\' extension not loaded.');
	return false;
}

class img2ascii
{

	public $inversion  = false;
	public $contrast   = false;
	public $brightness = false;
	public $newline = "\n";
	public $depth = "   .,'\"-=~+/I#@RW";

	public $reso_x = 512;
	public $reso_y = 512;

	public function draw( $sourceGD )
	{
		$range_of_one_shade = 256 / strlen( $this->depth );
		$depth = $this->depth;

		if( $this->reso_x ) {
			$reso_x = $this->reso_x;
			$mksize = true;
		} else {
			$reso_x = imagesx( $sourceGD );
		}

		if( $this->reso_y ) {
			$reso_y = $this->reso_y;
			$mksize = true;
		} else {
			$reso_y = imagesy( $sourceGD );
		}

		if( $mksize ) {
			$sourceGD = imagescale( $sourceGD, $reso_x, $reso_y );
		}

		if( $this->brightness ) {
			imagefilter( $sourceGD, IMG_FILTER_BRIGHTNESS, $this->brightness );
		}

		if( $this->contrast ) {
			imagefilter( $sourceGD, IMG_FILTER_CONTRAST, $this->contrast );
		}

		imagefilter( $sourceGD, IMG_FILTER_GRAYSCALE );
		if( $this->inversion ) {
			$depth = strrev($depth);
		}

		for( $y = 0, $ascii_art = ''; $y < $reso_y; $y++ ) {
			for( $x = 0; $x < $reso_x; $x++ ) {
				$value = imagecolorat( $sourceGD, $x, $y ) & 0xFF;
				$chr = (int) floor($value/$range_of_one_shade);
				$ascii_art .= $depth[$chr];
			}
			$ascii_art .= $this->newline;
		}

		return $ascii_art;
	}
}

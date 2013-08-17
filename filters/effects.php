<?php

class Effects{
	private $image;

	const GRAY 		= 1; //make gray image
	const BOOST 	= 2; //boost effect
	const FUZZY 	= 3; //fuzzy effect
	const AQUA 		= 4; //aqua effect
	const LIGHT 	= 5; //light effect
	const OLD 		= 6; //old photo effect
	const OLD2 		= 10; //old photo effect
	const COOL		= 7; //cool photo effect
	const EMBOSS	= 8; //emboss photo effect
	const SHARPEN 	= 9; //sharpen photo effect
	const SEPIA 	= 11; //sepia photo effect 
	const OLD3		= 12; //old photo effect
	const COLORISE 	= 13; //colorise photo effect
	const BUBBLES 	= 14; //bubbles photo effect

	/**
	 * run constructor
	 * resource &$image Image
	 * const $filter
	 */
	public function __construct( &$image, $filter = NULL){
		$this->image = $image;

		switch( $filter ){
			case self::BOOST:
				$this->makeBoost();
				break;
			case self::GRAY:
				$this->makeGray();
				break;
			case self::FUZZY:
				$this->makeFuzzy();
				break;
			case self::AQUA:
				$this->makeAqua();
				break;
			case self::LIGHT:
				$this->makeLight();
				break;
			case self::OLD:
				$this->makeOld();
				break;
			case self::OLD2:
				$this->makeOld2();
				break;
			case self::OLD3:
				$this->makeOld3();
				break;
			case self::COOL:
				$this->makeCool();
				break;
			case self::EMBOSS:
				$this->makeEmboss();
				break;
			case self::SHARPEN:
				$this->makeSharpen();
				break;
			case self::SEPIA:
				$this->makeSepia();
				break;
			case self::BUBBLES:
				$this->makeBubbles();
				break;
			case self::COLORISE:
				$this->makeColorise();
				break;
		}
	}

	public function makeBubbles()
	{
		$dest = imagecreatefromjpeg(dirname(__FILE__) . "/files/pattern4.jpg");

		$x = imagesx($this->image);
		$y = imagesy($this->image);

		$x2 = imagesx($dest);
		$y2 = imagesy($dest);

		$thumb = imagecreatetruecolor($x, $y);
		imagecopyresized($thumb, $dest, 0, 0, 0, 0, $x, $y, $x2, $y2);

		imagecopymerge($this->image, $thumb, 0, 0, 0, 0, $x, $y, 20);
		imagefilter($this->image, IMG_FILTER_BRIGHTNESS, 40);
		imagefilter($this->image, IMG_FILTER_CONTRAST, -10);

	}

	public function makeColorise()
	{
		$dest = imagecreatefromjpeg(dirname(__FILE__) . "/files/pattern5.jpg");

		$x = imagesx($this->image);
		$y = imagesy($this->image);

		$x2 = imagesx($dest);
		$y2 = imagesy($dest);

		$thumb = imagecreatetruecolor($x, $y);
		imagecopyresized($thumb, $dest, 0, 0, 0, 0, $x, $y, $x2, $y2);

		imagecopymerge($this->image, $thumb, 0, 0, 0, 0, $x, $y, 40);
		imagefilter($this->image, IMG_FILTER_CONTRAST, -25);

	}

	public function makeSepia()
	{
		imagefilter($this->image, IMG_FILTER_GRAYSCALE);
		imagefilter($this->image, IMG_FILTER_COLORIZE, 100, 50, 0);
	}

	public function makeSharpen()
	{
		$gaussian = array(
				array(1.0, 1.0, 1.0),
				array(1.0, -7.0, 1.0),
				array(1.0, 1.0, 1.0)
		);
		imageconvolution($this->image, $gaussian, 1, 4);
	}

	public function makeEmboss()
	{
		$gaussian = array(
				array(-2.0, -1.0, 0.0),
				array(-1.0, 1.0, 1.0),
				array(0.0, 1.0, 2.0)
		);
		imageconvolution($this->image, $gaussian, 1, 5);
	}

	public function makeCool()
	{
		imagefilter($this->image, IMG_FILTER_MEAN_REMOVAL);
		imagefilter($this->image, IMG_FILTER_CONTRAST, -50);
	}

	public function makeOld2()
	{
		$dest = imagecreatefromjpeg(dirname(__FILE__) . "/files/pattern1.jpg");

		$x = imagesx($this->image);
		$y = imagesy($this->image);

		$x2 = imagesx($dest);
		$y2 = imagesy($dest);

		$thumb = imagecreatetruecolor($x, $y);
		imagecopyresized($thumb, $dest, 0, 0, 0, 0, $x, $y, $x2, $y2);

		imagecopymerge($this->image, $thumb, 0, 0, 0, 0, $x, $y, 40);
	}

	public function makeOld3()
	{
		imagefilter($this->image, IMG_FILTER_CONTRAST, -30);

		$dest = imagecreatefromjpeg(dirname(__FILE__) . "/files/pattern3.jpg");

		$x = imagesx($this->image);
		$y = imagesy($this->image);

		$x2 = imagesx($dest);
		$y2 = imagesy($dest);

		$thumb = imagecreatetruecolor($x, $y);
		imagecopyresized($thumb, $dest, 0, 0, 0, 0, $x, $y, $x2, $y2);

		imagecopymerge($this->image, $thumb, 0, 0, 0, 0, $x, $y, 50);
	}

	public function makeOld()
	{
		$dest = imagecreatefromjpeg(dirname(__FILE__) . "/files/bg1.jpg");

		$x = imagesx($this->image);
		$y = imagesy($this->image);

		$x2 = imagesx($dest);
		$y2 = imagesy($dest);

		$thumb = imagecreatetruecolor($x, $y);
		imagecopyresized($thumb, $dest, 0, 0, 0, 0, $x, $y, $x2, $y2);

		imagecopymerge($this->image, $thumb, 0, 0, 0, 0, $x, $y, 30);
	}

	public function makeLight()
	{
		imageFilter($this->image, IMG_FILTER_BRIGHTNESS, 10);
		imagefilter($this->image, IMG_FILTER_COLORIZE, 100, 50, 0, 10);
	}

	public function makeAqua()
	{
		imagefilter($this->image, IMG_FILTER_COLORIZE, 0, 70, 0, 30);
	}

	public function makeFuzzy()
	{
		$gaussian = array(
				array(1.0, 1.0, 1.0),
				array(1.0, 1.0, 1.0),
				array(1.0, 1.0, 1.0)
		);

		imageconvolution($this->image, $gaussian, 9, 20);
	}

	private function makeBoost()
	{
		imagefilter($this->image, IMG_FILTER_CONTRAST, -35);
		imagefilter($this->image, IMG_FILTER_BRIGHTNESS, 10);
	}

	private function makeGray()
	{
		imageFilter($this->image, IMG_FILTER_CONTRAST, -60);
		imageFilter($this->image, IMG_FILTER_GRAYSCALE);
	}
}

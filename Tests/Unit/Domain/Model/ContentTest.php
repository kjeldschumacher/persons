<?php
namespace CPSIT\Persons\Tests\Unit\Domain\Model;

use Nimut\TestingFramework\TestCase\UnitTestCase;
use CPSIT\Persons\Domain\Model\Content;

/**
 * Class ContentTest
 */
class ContentTest extends UnitTestCase {

	/**
	 * @var Content
	 */
	protected $content;

	/**
	 * Setup
	 *
	 * @return void
	 */
	protected function setUp() {
		$this->content = new Content();
	}

	/**
	 * @test
	 */
	public function crdateCanBeSet() {
		$fieldValue = new \DateTime();
		$this->content->setCrdate($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getCrdate());
	}

	/**
	 * @test
	 */
	public function tstampCanBeSet() {
		$fieldValue = new \DateTime();
		$this->content->setTstamp($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getTstamp());
	}

	/**
	 * @test
	 */
	public function cTypeCanBeSet() {
		$fieldValue = 'fo123';
		$this->content->setCType($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getCType());
	}

	/**
	 * @test
	 */
	public function headerCanBeSet() {
		$fieldValue = 'fo123';
		$this->content->setHeader($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getHeader());
	}

	/**
	 * @test
	 */
	public function headerPositionCanBeSet() {
		$fieldValue = 'fo123';
		$this->content->setHeaderPosition($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getHeaderPosition());
	}

	/**
	 * @test
	 */
	public function bodytextCanBeSet() {
		$fieldValue = 'fo123';
		$this->content->setBodytext($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getBodytext());
	}

	/**
	 * @test
	 */
	public function colPosCanBeSet() {
		$fieldValue = 1;
		$this->content->setColPos($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getColPos());
	}

	/**
	 * @test
	 */
	public function imageCanBeSet() {
		$fieldValue = 'fo123';
		$this->content->setImage($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getImage());
	}

	/**
	 * @test
	 */
	public function imageWidthCanBeSet() {
		$fieldValue = 123;
		$this->content->setImagewidth($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getImagewidth());
	}

	/**
	 * @test
	 */
	public function imageOrientCanBeSet() {
		$fieldValue = 'Test123';
		$this->content->setImageorient($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getImageorient());
	}

	/**
	 * @test
	 */
	public function imageCaptionCanBeSet() {
		$fieldValue = 'Test123';
		$this->content->setImagecaption($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getImagecaption());
	}

	/**
	 * @test
	 */
	public function imageColsCanBeSet() {
		$fieldValue = 123;
		$this->content->setImagecols($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getImagecols());
	}

	/**
	 * @test
	 */
	public function imageBorderCanBeSet() {
		$fieldValue = 123;
		$this->content->setImageborder($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getImageborder());
	}

	/**
	 * @test
	 */
	public function mediaCanBeSet() {
		$fieldValue = 'Test 123';
		$this->content->setMedia($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getMedia());
	}

	/**
	 * @test
	 */
	public function layoutCanBeSet() {
		$fieldValue = 'Test 123';
		$this->content->setLayout($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getLayout());
	}

	/**
	 * @test
	 */
	public function colsCanBeSet() {
		$fieldValue = 123;
		$this->content->setCols($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getCols());
	}

	/**
	 * @test
	 */
	public function subheaderCanBeSet() {
		$fieldValue = 'Test 123';
		$this->content->setSubheader($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getSubheader());
	}

	/**
	 * @test
	 */
	public function headerLinkCanBeSet() {
		$fieldValue = 'Test 123';
		$this->content->setHeaderLink($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getHeaderLink());
	}

	/**
	 * @test
	 */
	public function imageLinkCanBeSet() {
		$fieldValue = 'Test 123';
		$this->content->setImageLink($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getImageLink());
	}

	/**
	 * @test
	 */
	public function imageZoomCanBeSet() {
		$fieldValue = 'Test 123';
		$this->content->setImageZoom($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getImageZoom());
	}

	/**
	 * @test
	 */
	public function altTextCanBeSet() {
		$fieldValue = 'Test 123';
		$this->content->setAltText($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getAltText());
	}

	/**
	 * @test
	 */
	public function titleTextCanBeSet() {
		$fieldValue = 'Test 123';
		$this->content->setTitleText($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getTitleText());
	}

	/**
	 * @test
	 */
	public function headerLayoutCanBeSet() {
		$fieldValue = 'Test 123';
		$this->content->setHeaderLayout($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getHeaderLayout());
	}

	/**
	 * @test
	 */
	public function listTypeCanBeSet() {
		$fieldValue = 'Test 123';
		$this->content->setListType($fieldValue);
		$this->assertEquals($fieldValue, $this->content->getListType());
	}
}

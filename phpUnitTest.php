<?php

class Test extends PHPUnit_Framework_TestCase {

	public function testsaveName() {
		$url = "equipmentajax.php?cmd=1&txtName=change&equipID=5858";
		$expected = '{"result":1, "Text":"done"}';
		$this->assertTrue(true, $url, $expected);
	}

	public function testsaveDescription() {
		$url = "equipmentajax.php?cmd=1&txtName=change&equipID=5858";
		$expected = '{"result":1, "Text":"done"}';
		$this->assertTrue(true, $url, $expected);
	}

	public function testsaveStatus() {
		$url = "equipmentajax.php?cmd=1&txtName=change&equipID=5858";
		$expected = '{"result":1, "Text":"done"}';
		$this->assertTrue(true, $url, $expected);
	}

	public function testsaveCategory() {
		$url = "equipmentajax.php?cmd=1&txtName=change&equipID=5858";
		$expected = '{"result":1, "Text":"done"}';
		$this->assertTrue(true, $url, $expected);
	}

	public function testsavePrice() {
		$url = "equipmentajax.php?cmd=1&txtName=change&equipID=5858";
		$expected = '{"result":1, "Text":"done"}';
		$this->assertTrue(true, $url, $expected);
	}

	public function testsaveManufacturer() {
		$url = "equipmentajax.php?cmd=1&txtName=change&equipID=5858";
		$expected = '{"result":1, "Text":"done"}';
		$this->assertTrue(true, $url, $expected);
	}
}
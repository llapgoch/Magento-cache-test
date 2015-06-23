<?php
class Cache_Test_Model_Observer{
	public function outputValue(){
		var_dump(Mage::helper('cachetest')->getValue());
	}
}
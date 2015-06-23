<?php
class Cache_Test_Helper_Data extends Mage_Core_Helper_Abstract{
	const CACHE_TAG = "CACHE_TEST";
	const CACHE_VALUE_KEY_PREFIX = "cache_test";
	
	public function getCacheKey($key){
		return self::CACHE_VALUE_KEY_PREFIX . "_" . $key;
	}
	
	// The value will be cached the first time until cache is cleared or until x seconds have expired!
	public function getValue(){
		$val = unserialize(Mage::app()->getCache()->load($this->getCacheKey('moose')));
		
		if(!$val){
			$vals = array("GOOSE", "MOOSE", "NOOP", "WOOP");
			$val = $vals[array_rand($vals, 1)];
			Mage::app()->getCache()->save(serialize($val), $this->getCacheKey('moose'), array(self::CACHE_TAG), 20);
		}
		
		return $val;
	}
}
<?php namespace App;
class ArraySort {

	public static function group($array,$groupkey)
	{
	 if (count($array)>0)
	 {
	 	$keys = array_keys($array[0]);
	 	$removekey = array_search($groupkey, $keys);		if ($removekey===false)
	 		return array("Clave \"$groupkey\" no existe");
	 	else
	 		unset($keys[$removekey]);
	 	$groupcriteria = array();
	 	$return=array();
	 	foreach($array as $value)
	 	{
	 		$item=null;
	 		foreach ($keys as $key)
	 		{
	 			$item[$key] = $value[$key];
	 		}
	 	 	$busca = array_search($value[$groupkey], $groupcriteria);
	 		if ($busca === false)
	 		{
	 			$groupcriteria[]=$value[$groupkey];
	 			$return[]=array($groupkey=>$value[$groupkey],'grupo'=>array());
	 			$busca=count($return)-1;
	 		}
	 		$return[$busca]['grupo'][]=$item;
	 	}
	 	return $return;
	 }
	 else
	 	return array();
	}

}

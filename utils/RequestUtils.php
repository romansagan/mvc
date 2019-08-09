<?php


class PostRequest
{
	public static function getPropertyFromRequest($propertyName, $defaultValue = 'defaultValue')
	{
		return isset($_POST[$propertyName]) ? $_POST[$propertyName] : $defaultValue;
	}

	public static function exequteRequest($sql)
	{
		$db = Db::getConnection();
		$result = $db->query($sql);
		return $result;
	}
}

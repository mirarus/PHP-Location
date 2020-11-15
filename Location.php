<?php

/**
 * PHP Mini Location Library
 *
 * PHP versions 5 and 7
 *
 *
 * @author     Ali Güçlü (Mirarus) <aliguclutr@gmail.com>
 * @created_date	15.11.2020 - 20:20 (UTC+3)
 * @updated_date	15.11.2020 - 20:32 (UTC+3)
 * @version    Release: 1.3
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
*/

class Location
{

	static public function get_country_code($code, &$return=null)
	{
		$countries = self::countries();

		foreach ($countries as $data) {
			if ($data['code'] == $code) {
				return $return = $data;
			}
		}
	}

	static public function get_country($id, &$return=null)
	{
		$countries = self::countries();

		foreach ($countries as $data) {
			if ($data['id'] == $id) {
				return $return = $data;
			}
		}
	}

	static public function get_states($country_id, &$return=null)
	{
		$states = self::states();
		
		$state = [];
		foreach ($states as $data) {
			if ($data['country_id'] == $country_id) {
				$state[] = $data;
			}
		}
		return $return = $state;
	}

	static public function get_cities($state_id, &$return=null)
	{
		$cities = self::cities();

		$city = [];
		foreach ($cities as $data) {
			if ($data['state_id'] == $state_id) {
				$city[] = $data;
			}
		}
		return $return = $city;
	}

	static public function countries(&$return=null)
	{
		if (file_exists($file = __DIR__ . '/Location/countries.json')) {

			ob_start();
			require_once $file;
			$json = ob_get_contents();
			ob_end_clean();
			$json = json_decode($json, true);
			return $return = $json['countries'];
		}
	}

	static public function states(&$return=null)
	{
		if (file_exists($file = __DIR__ . '/Location/states.json')) {

			ob_start();
			require_once $file;
			$json = ob_get_contents();
			ob_end_clean();
			$json = json_decode($json, true);
			return $return = $json['states'];
		}
	}

	static public function cities(&$return=null)
	{
		if (file_exists($file = __DIR__ . '/Location/cities.json')) {

			ob_start();
			require_once $file;
			$json = ob_get_contents();
			ob_end_clean();
			$json = json_decode($json, true);
			return $return = $json['cities'];
		}
	}
}
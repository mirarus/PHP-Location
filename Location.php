<?php

class Location
{

	static public function get_country($code)
	{
		$countries = self::countries();

		foreach ($countries as $data) {
			if ($data['code'] == $code) {
				return $data;
			}
		}
	}

	static public function get_states($country_id)
	{
		$states = self::states();
		
		$state = [];
		foreach ($states as $data) {
			if ($data['country_id'] == $country_id) {
				$state[] = $data;
			}
		}
		return $state;
	}

	static public function get_cities($state_id)
	{
		$cities = self::cities();

		$city = [];
		foreach ($cities as $data) {
			if ($data['state_id'] == $state_id) {
				$city[] = $data;
			}
		}
		return $city;
	}

	static public function countries()
	{
		if (file_exists($file = __DIR__ . '/Location/countries.json')) {

			ob_start();
			require_once $file;
			$json = ob_get_contents();
			ob_end_clean();
			$json = json_decode($json, true);
			return $json['countries'];
		}
	}

	static public function states()
	{
		if (file_exists($file = __DIR__ . '/Location/states.json')) {

			ob_start();
			require_once $file;
			$json = ob_get_contents();
			ob_end_clean();
			$json = json_decode($json, true);
			return $json['states'];
		}
	}

	static public function cities()
	{
		if (file_exists($file = __DIR__ . '/Location/cities.json')) {

			ob_start();
			require_once $file;
			$json = ob_get_contents();
			ob_end_clean();
			$json = json_decode($json, true);
			return $json['cities'];
		}
	}
}
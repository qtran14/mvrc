<?php
class Cronjob extends Model {
	protected $table = 'cronjob';

	public function isActive($id) {
		$cronjob_info = $this->info($id);

		if ( empty($cronjob_info) ) return false;
		if ( $cronjob_info['status_id'] == 2 )  return false;

		return true;
	}
}
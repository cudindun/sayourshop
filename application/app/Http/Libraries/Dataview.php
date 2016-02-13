<?php namespace App\Http\Libraries;

class Dataview {

	public function get_rows($table, $param)
	{
		$select = $table->select( \DB::raw($param['select']) )
						->skip($param['input']['limit'])
						->take($param['input']['offset']);
						
		return $select->get();
	}

	public function get_total_rows($table, $param)
	{
		$select_total = $table->select( \DB::raw('sql_calc_found_rows ' . $param['select']) );
		$select_total = $select_total->get();
		$select_total = \DB::select( \DB::raw("select found_rows() as total;") );

		return $select_total[0]->total;
	}

	public function query($param, $modifier)
	{
		$table = $modifier( \DB::table($param['table']) );
		$select = $this->get_rows($table, $param);
		$select_total = $this->get_total_rows($table, $param);
		
		return ['total' => $select_total, 'rows' => $select];
	}

}
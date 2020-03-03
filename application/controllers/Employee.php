<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{

	public function index()
	{
		$this->load->view('employee');
	}

	public function getEmployees()
	{
		$data = self::getData();
		echo $data; exit;
	}

	public function getData()
	{
		return file_get_contents('application\emp.json', true);
	}

	public function editEmployees()
	{

		$data = $this->input->post('data');
		$data['DT_RowId'] = random_int(50,100);
		$arr = [
			"data" =>[$data]
		];
		echo  json_encode($arr);
		exit;
	}
}

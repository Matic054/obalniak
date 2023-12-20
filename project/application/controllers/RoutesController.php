<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RoutesController extends CI_Controller {

	public function index()
	{
		$this->load->model('Routes_model');
        $data['routes'] = $this->Routes_model->get_routes();

        if ($this->session->userdata('has_photo')){
			$this->load->model('User_model');
			$data['photo'] = $this->User_model->get_profile_image($this->session->userdata('user_name'));
			$this->load->view('templates/header', $data);
			$this->load->view('routes', $data);
		    $this->load->view('templates/footer');
		} else {
			$this->load->view('templates/header');
            $this->load->view('routes', $data);
            $this->load->view('templates/footer');
		}
	}

	public function create(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['selectedUsers'])) {
				// Get an array of selected user IDs
				$selectedUserIds = $_POST['selectedUsers'];
		
				$this->load->model('User_model');
				$climbers = "";
				$len = count($selectedUserIds);
				foreach ($selectedUserIds as $userId) {
					$username = $this->User_model->get_username_by_id($userId);
					$climbers = $climbers . $username;
					$len = $len - 1;
					if ($len != 0){
						$climbers = $climbers . ", ";
					}
				}
			}
            $date = $this->input->post('date');
            $mountainName = $this->input->post('mountainName');
			$route = $this->input->post('routeDescription');
			$length = $this->input->post('length');
			$difficulty = $this->input->post('difficulty');
			$notes = $this->input->post('notes');

			$this->load->model('User_model');
			$user_name = $this->session->userdata('user_name');
			$user_id = $this->User_model->get_id_by_username($user_name);

            $route_data = array(
				'user_id' => $user_id,
                'date' => $date,
                'climbers' => $climbers,
				'mountain' => $mountainName,
				'route' => $route,
				'length' => $length,
				'difficulty' => $difficulty,
				'notes' => $notes
            );

            $this->load->model('Routes_model');
            $this->Routes_model->create_route($route_data);
			redirect("/index.php/routes");
		}
	}

	public function export_csv(){
		$this->load->model('Routes_model');

		// Fetch event data from the model
		$routes = $this->Routes_model->get_routes();

		// Generate CSV data
		$csvData = $this->generateCsvData($routes);

		// Set headers for CSV download
		header('Content-Type: text/csv');
		header('Content-Disposition: attachment; filename="routes.csv"');

		// Output the CSV data to the browser
		echo $csvData;
		exit();
	}

	public function generateCsvData($routes){
		$output = fopen('php://output', 'w');

		fputcsv($output, array('Date', 'Climbers', 'Mountain', 'Route', 'Length(m)', 'Difficulty', 'Notes'));

		foreach ($routes as $route) {
			fputcsv($output, array($route->date, $route->climbers, $route->mountain, $route->route, $route->length, $route->difficulty, $route->notes));
		}

		fclose($output);

		return ob_get_clean();
	}

	public function delete_route($user_id, $date){
		$this->load->model('Routes_model');
		$this->Routes_model->delete_route($user_id, $date);
		redirect("index.php/routes");
	}

}
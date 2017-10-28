<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
    function index()
    {
        $this->load->model('HomeModel', 'home_model');

        $all_items = $this->home_model->get_all_items_data();

        $all_items_to_display = array();
        
        foreach($all_items as $item)
        {
            $item_id = $item['id'];
            $item_to_display['item_id'] = $item_id;
            $item_to_display['item_pic'] = $this->home_model->get_item_pic_by_item_id($item_id);
            $item_to_display['item_name'] = $item['item_name'];
            $item_to_display['price'] = $item['price'];

            $user_id_of_seller = $item['user_id'];
            $seller = $this->home_model->get_user_by_user_id($user_id_of_seller);

            $item_to_display['seller_name'] = (!empty($seller['first_name'])) ? $seller['first_name'] : 'no name found';
            $item_to_display['seller_pic'] = (!empty($seller['user_image'])) ? $seller['user_image'] : 'no seller image found';

            array_push($all_items_to_display, $item_to_display);
        }

        $data['all_items_to_display'] = $all_items_to_display;

        $this->load->helper('url');

        $data['navbar'] = $this->load->view('Navbar', NULL, TRUE);
        $data['footer'] = $this->load->view('Footer', NULL, TRUE);

        $this->load->view('Home', $data);
    }
}
?>
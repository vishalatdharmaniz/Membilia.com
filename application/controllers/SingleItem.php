<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SingleItem extends CI_Controller 
{
    function index($item_id)
    {
        $this->load->model('SingleItemModel','single_item');
        $this->load->model('HomeModel', 'home_model');
        
        $all_images_for_item = $this->single_item->get_item_pics_by_item_id($item_id);
        $data['all_images_for_item'] = $all_images_for_item;

        $all_videos_for_item = $this->single_item->get_item_videos_by_item_id($item_id);
        $data['all_videos_for_item'] = $all_videos_for_item;

        $item_data = $this->single_item->get_item_data_by_item_id($item_id);
        $item_data_array = (!empty($item_data[0])) ? $item_data[0] : array();

        $item_location = $this->single_item->get_item_location_by_item_id($item_id);

        $user_id = $item_data_array['user_id'];

        $seller = $this->home_model->get_user_by_user_id($user_id);

        $data['seller_id'] = $user_id;
        $data['seller_pic'] = $seller['user_image'];
        $data['seller_name'] = $seller['first_name'];
        $data['item_name'] = $item_data_array['item_name'];
        $data['item_price'] = $item_data_array['price'];
        $data['item_story'] = $item_data_array['item_story'];
        $data['item_category'] = $item_data_array['category'];
        $data['item_genre'] = $item_data_array['genre'];
        $data['item_genre_value'] = $item_data_array['genre_value'];
        $data['item_tags'] = $item_data_array['tags'];
        $data['item_sport'] = $item_data_array['sport'];
        $data['item_autograph_status'] = $item_data_array['isAutographed'] == '1' ? 'Yes' : 'No';
        $data['item_charity_name'] = $item_data_array['charity_name'];
        $data['item_location'] = $item_location;

        $this->load->helper('url');

        $data['navbar'] = $this->load->view('Navbar', NULL, TRUE);
        $data['footer'] = $this->load->view('Footer', NULL, TRUE);

        $this->load->view ('SingleItem', $data);
    }
}
?>
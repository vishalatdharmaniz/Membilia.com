<?php
class SingleItemModel extends CI_Model 
{    
    public function get_item_pics_by_item_id($item_id)
    {
        $item_images = $this->db->query("SELECT image FROM item_image 
                                            WHERE item_id = '$item_id'");
        $item_images_as_array = $item_images->result_array();

        if(!empty($item_images_as_array))
        {
            $item_images = array();
            foreach ($item_images_as_array as $key => $item_image_as_array)
            {
                array_push($item_images, $item_images_as_array[$key]["image"]);
            }
            return $item_images;
        }

        return array();
    }

    public function get_item_videos_by_item_id($item_id)
    {
        $item_videos = $this->db->query("SELECT video FROM video_item 
                                            WHERE item_id = '$item_id'");
        $item_videos_as_array = $item_videos->result_array();

        if(!empty($item_videos_as_array))
        {
            $item_videos = array();
            foreach ($item_videos_as_array as $key => $item_video_as_array)
            {
                array_push($item_videos, $item_videos_as_array[$key]["video"]);
            }
            return $item_videos;
        }

        return array();
    }

    public function get_item_data_by_item_id($item_id)
    {
        $requested_item = $this->db->query("SELECT * FROM items WHERE id = '$item_id'");
        return $requested_item->result_array();
    }

    public function get_item_location_by_item_id($item_id)
    {
        $requested_item_location = $this->db->query("SELECT administrative_area_level_1 FROM item_location WHERE item_id = '$item_id'");
        $requested_item_location_as_array = $requested_item_location->result_array();
        return $requested_item_location_as_array[0]['administrative_area_level_1'];
    }

    public function get_user_by_user_id($user_id)
    {
        $user = $this->db->query("SELECT * FROM tbl_users WHERE user_id = '$user_id'");
        $user_as_array = $user->result_array();
        return (!empty($user_as_array[0])) ? $user_as_array[0] : NULL;
    }
}
?>
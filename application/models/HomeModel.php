<?php
class HomeModel extends CI_Model 
{   
    public function get_all_items_data()
    {
        $all_items = $this->db->query("SELECT * FROM items WHERE 1");
        return $all_items->result_array();
    }

    public function get_item_pic_by_item_id($item_id)
    {
        $item_image = $this->db->query("SELECT image FROM item_image 
                                            WHERE item_id = '$item_id' and `index` = '1' ");
        $item_image_as_array = $item_image->result_array();

        
        return (!empty($item_image_as_array[0]["image"])) ? $item_image_as_array[0]["image"] : 'no-image found';
    }

    public function get_user_by_user_id($user_id)
    {
        $user = $this->db->query("SELECT * FROM tbl_users WHERE user_id = '$user_id'");
        $user_as_array = $user->result_array();
        return (!empty($user_as_array[0])) ? $user_as_array[0] : NULL;
    }

    public function get_all_items_data_by_name($name)
    {
        $all_items_by_name = $this->db->query("SELECT * FROM items WHERE item_name LIKE '%$name%'");
        return $all_items_by_name->result_array();
    }
}
?>
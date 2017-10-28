<?php session_start(); ?>
<html>
<head>
<title>Membilia</title>
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>Public/css/Singleitem.css"/> 
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>Public/css/Global.css"/> 
<?php include_once("Public/Bootstrap/Bootstrap.php");?>
<script>
function follow(seller_id)
{
    window.location.href = "<?php echo base_url(); ?>index.php/FollowSeller/index/"+seller_id;
}
</script>
</head>
<body>
    <!-- Include Navigation Bar -->
    <?php echo $navbar; ?>
    
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="item-images-videos col-xs-12 col-sm-12 col-md-6 col-lg-6">

                    <?php if(COUNT($all_images_for_item) != 0): ?>
                        <?php foreach($all_images_for_item as $image_src): ?>
                            <img class= "item-image-video" src="<?php echo $image_src; ?>" alt="">
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if(COUNT($all_videos_for_item) != 0): ?>
                        <?php foreach($all_videos_for_item as $video_src): ?>
                            <video class= "item-image-video" loop src="<?php echo $video_src; ?>" autoplay></video>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
                <div class="item-data col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="seller-info">
                        <img class="seller-pic" src="<?php echo $seller_pic; ?>" alt="">
                        <div class="seller-name-follow-button">
                            <div class="seller-name">
                                <h4><b><?php echo $seller_name; ?></b></h4>
                            </div>
                            <div class="follow-seller">
                                <button onclick="follow(<?php echo $seller_id; ?>)" class="background-color-white follow-button" type="submit">
                                    Follow
                                </button> 
                            </div>
                        </div>
                    </div>

                    <div class="one-data-item">
                        <b><?php echo $item_name; ?> &nbsp; &nbsp; $<?php echo $item_price; ?></b>
                    </div>

                    <div class="one-data-item">
                        <b>Item Story : </b><?php echo $item_story; ?>
                    </div>

                    <div class="one-data-item">
                        <b>Category : </b><?php echo $item_category; ?>  
                    </div>

                    <div class="one-data-item">
                        <b>Genre : </b><?php echo $item_genre; ?> > <?php echo $item_genre_value; ?> 
                    </div>

                    <div class="one-data-item">
                        <b>Location : </b><?php echo $item_location; ?> 
                    </div>

                    <div class="one-data-item">
                        <b>Sport : </b><?php echo $item_sport; ?> 
                    </div>

                    <div class="one-data-item">
                        <b>Tags : </b><?php echo $item_tags; ?> 
                    </div>

                    <div class="one-data-item">
                        <b>Autographed : </b><?php echo $item_autograph_status; ?> 
                    </div>

                    <div class="one-data-item">
                        <b>Charity : </b><?php echo $item_charity_name; ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Include Footer -->
     <?php echo $footer; ?>
</body>
</html>
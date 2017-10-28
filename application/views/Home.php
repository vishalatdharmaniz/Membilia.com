<html>
<head>
<title>Membilia</title>
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>Public/css/Home.css"/> 
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>Public/css/Global.css"/> 
<?php include_once("Public/Bootstrap/Bootstrap.php");?>
<script>
var search_item;
function search(search_item)
{
    if(search_item == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
        window.location.href = "<?php echo base_url(); ?>index.php/SearchItems/index/"+search_item;
    }
}
</script>
</head>
<body>
    <!-- Include Navigation Bar -->
    <?php echo $navbar; ?>
    <div class="main-container">
        <!-- Search Bar -->
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div id="imaginary_container"> 
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control"  placeholder="Search" id="search_item">
                            <span class="input-group-addon background-color-white">
                                <button onclick="search(document.getElementById('search_item').value)" style="border:none;" class="background-color-white" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>  
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- All items -->
        <div class="items-container container">
            <div class="row">
                <?php foreach($all_items_to_display as $item_to_display): ?>
                <div class="item col-md-2 col-xs-6 col-lg-2 col-sm-6">
                    <a href="<?php echo base_url(); ?>index.php/SingleItem/index/<?php echo $item_to_display["item_id"]; ?>">
                        <img src="<?php echo $item_to_display["item_pic"]; ?>" alt="no-image found">
                    </a>
                    <div class="item-name">
                        <?php echo $item_to_display["item_name"]; ?>
                    </div>
                    <div class="item-price">
                        $<?php echo $item_to_display["price"]; ?>
                    </div>
                    <div class="seller-info">
                        <img src="<?php echo $item_to_display["seller_pic"]; ?>" alt="no seller image found">
                        <div class="seller-name">
                            <?php echo $item_to_display["seller_name"]; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>


    </div>
     <!-- Include Footer -->
     <?php echo $footer; ?>
</body>
</html>
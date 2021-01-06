<link rel="stylesheet" href="css/categories_style.css" >
<script src="js/info_category.js" type="text/javascript"></script>

<div class="flex-grow-1 subtle-pattern">
    <div class="container-fluid bg-white flex-flow-row-wrap subtle-pattern">
        <h1 class="display-4 my-4 w-100 text-center">Categories</h1>

        <?php $i = 0; ?>
        <?php foreach($templateParams["categories"] as $category): ?>

            <?php if($i == 0): ?> <div class="row border  bg-white mx-0 mb-4 px-5 py-3"> <?php endif; ?>
            
            <div class="col-6 d-block d-sm-none d-flex align-items-center py-5">
                <a href="shop.php?category=<?php echo $category["Name"]; ?>">
                    <img class="img-fluid category-image" src="<?php echo UPLOAD_DIR.$category["Image"]; ?>" 
                        alt="<?php echo $category["Name"].", orientation: ".$category["Orientation"]; ?>" />
                </a>
                <a href="shop.php?category=<?php echo $category["Name"]; ?>" 
                    class="middle text-white bg-dark p-2"><h5 class="m-0"><?php echo $category["Name"]; ?></h5>
                </a>
            </div>

            <div class="col-sm-3 d-none d-sm-block py-5">
                <div class="h-100 d-flex align-items-center">
                    <a href="shop.php?category=<?php echo $category["Name"]; ?>">
                        <img class="img-fluid category-image" src="<?php echo UPLOAD_DIR.$category["Image"]; ?>" 
                            alt="<?php echo $category["Name"].", orientation: ".$category["Orientation"]; ?>" />
                    </a>
                    <a href="shop.php?category=<?php echo $category["Name"]; ?>" 
                        class="middle text-white bg-dark p-2"><h4 class="m-0"><?php echo $category["Name"]; ?></h4>
                    </a>
                </div>
            </div>

            <?php if($i == 3): $i = -1; ?> </div> <?php endif; ?>
            <?php $i++ ?>


        <?php endforeach; ?>
    </div>
</div>

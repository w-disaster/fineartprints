<link rel="stylesheet" href="css/product.css">

<div class="flex-grow-1 subtle-pattern">
    <div class="container-fluid bg-white flex-flow-row-wrap subtle-pattern">
        <div class="container px-4">
            <div class="row">
                <div class="container bg-white rounded shadow-sm">
                    <h1 class="text-center text-info mt-3">Customize your print</h1>
                    <p class="text-center lead">Choose the printing technique, the frame
                        and finally add a passpartout.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="container bg-white rounded shadow-sm mt-4">
                    <div class="row">
                        <div class="col-md-8 pl-4 py-5">
                            <div class="row px-3">
                                <a href="<?php echo UPLOAD_DIR.$print["Image"]; ?>"><img alt="<?php echo $title; ?>" class="img-fluid d-block" src="<?php echo UPLOAD_DIR.$print["Image"]; ?>"></a>
                            </div>
                            <div class="row mt-4 pl-4 pr-5">
                                <p class="text-uppercase h6">Description</p>
                                <p class="summary">
                                    <?php echo $print["Description"]; ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 pl-2 py-3 mx-0">
                            <div class="row mx-3 mt-3">
                                <h2>
                                    <?php echo $print["Title"]; ?>
                                </h2>
                            </div>
                            <div class="row mx-3 mt-3 mx-0">
                                <?php if($print["Discount"] <= 0): ?>
                                <p id="price" class=" h3 mb-4 mr-2">
                                    <?php echo $templateParams["price"]; ?> €</p>
                                <?php else: ?>
                                <p id="price" class="text-muted h3 mb-4 mr-2"><del>
                                        <?php echo $templateParams["price"]; ?></del></p>
                                <p id="price-discounted" class="h3 mb-4 mr-3">
                                    <?php echo $templateParams["price_discounted"]; ?> €</p>
                                <?php endif; ?>
                                <?php if(!isUserLoggedIn(UserType::Seller)): ?>
                                <button class="btn btn-block btn-primary ml-2 mb-3" type="button">Add to cart</button>
                                <?php endif; ?>
                                <p>Prices are computed taking into account the width and height of the print, the technique employed and the available customizations in addition to the base price, computed for the default dimensions of <?php echo default_width ?> cm &times; <?php echo default_height ?> cm.</p>
                            </div>
                            <div class="row">
                                <div class="container mt-2 p-4 border bg-light mx-3">
                                    <p class="h6 text-uppercase text-center">Print size</p>
                                    <div class="row d-flex justify-content-center">
                                        <label class="mr-1" for="inputWidth">width</label> &times; <label class="ml-1 mr-2" for="inputHeight">height in cm</label>
                                    </div>
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <input type="number" step="0.01" min="<?php echo default_width ?>" max="<?php echo max_width?>" id="inputWidth" class="mr-2" value="<?php echo $templateParams["width"]; ?>" required>
                                        &times;
                                        <input type="number" step="0.01" min="<?php echo default_height ?>" max="<?php echo max_height?>" id="inputHeight" class="ml-2" value="<?php echo $templateParams["height"]; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="container mt-4 py-4 pt-1 border bg-light mx-3">
                                    <div class="row">
                                        <div class="accordion d-flex flex-column flex-grow-1 py-2 px-4">
                                            <p class="h6 text-uppercase">Print Technique</p>
                                            <button id="technique-choice" class="text-left">
                                            <?php if(empty($templateParams["technique_id"])): ?>
                                                <span>none</span>
                                            <?php else: ?>
                                                <span class="media justify-content-center">
                                                    <img class="mr-3" src="<?php echo UPLOAD_DIR.$chosenTechnique["Image"] ?>" width="50%" alt="
                                                    <?php echo $chosenTechnique["Technique_id"] ?>">
                                                    <span class="media-body">
                                                        <span class="h5 d-block"><?php echo $chosenTechnique["Technique_id"] ?></span>
                                                        <span class="h6 d-block"><?php echo $chosenTechnique["Description"] ?></span>
                                                    </span>
                                                </span>
                                            <?php endif; ?>
                                            </button>
                                            <div>
                                                <?php foreach ($techniques as $technique) : ?>
                                                <button class="w-100 mt-1">
                                                    <span class="media justify-content-center">
                                                        <img class="mr-3" src="<?php echo UPLOAD_DIR.$technique["Image"] ?>" width="50%" alt="
                                                        <?php echo $technique["Technique_id"] ?>">
                                                        <span class="media-body">
                                                            <span class="h5 d-block"><?php echo $technique["Technique_id"] ?></span>
                                                            <span class="h6 d-block"><?php echo $technique["Description"] ?></span>
                                                        </span>
                                                    </span>
                                                </button>
                                                <?php endforeach; ?>
                                                <button class="text-left w-100">none</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="accordion d-flex flex-column flex-grow-1 py-2 px-4">
                                            <p class="h6 text-uppercase">Frame</p>
                                            <button id="frame-choice" class="text-left">
                                            <?php if(empty($templateParams["frame_id"])): ?>
                                                <span>none</span>
                                            <?php else: ?>
                                                <span class="media justify-content-center">
                                                    <img class="mr-3" src="<?php echo UPLOAD_DIR.$chosenFrame["Image"] ?>" width="50%" alt="
                                                    <?php echo $chosenFrame["Frame_id"] ?>">
                                                    <span class="media-body">
                                                        <span class="h5 d-block"><?php echo $chosenFrame["Frame_id"] ?></span>
                                                        <span class="h6 d-block"><?php echo $chosenFrame["Description"] ?></span>
                                                    </span>
                                                </span>
                                            <?php endif; ?>
                                            </button>
                                            <div>
                                                <?php foreach ($frames as $frame): ?>
                                                <button class="w-100 mt-1">
                                                    <span class="media">
                                                        <img class="mr-3" src="<?php echo UPLOAD_DIR.$frame["Image"] ?>" alt="
                                                        <?php echo $frame["Frame_id"] ?>">
                                                        <span class="media-body">
                                                            <span class="h5 d-block"><?php echo $frame["Frame_id"] ?></span>
                                                            <span class="h6 d-block"><?php echo $frame["Description"] ?></span>
                                                        </span>
                                                    </span>
                                                </button>
                                                <?php endforeach; ?>
                                                <button class="text-left w-100">none</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="accordion d-flex flex-column flex-grow-1 py-2 px-4">
                                            <p class="h6 text-uppercase">Passpartout</p>
                                            <button id="passpartout-choice" class="text-left">
                                            <?php if(empty($templateParams["passpartout_id"])): ?>
                                                <span>none</span>
                                            <?php else: ?>
                                                <span class="media justify-content-center">
                                                    <img class="mr-3" src="<?php echo UPLOAD_DIR.$chosenPasspartout["Image"] ?>" alt="
                                                    <?php echo $chosenPasspartout["Passpartout_id"] ?>">
                                                    <span class="media-body">
                                                        <span class="h5 d-block"><?php echo $chosenPasspartout["Passpartout_id"] ?></span>
                                                        <span class="h6 d-block"><?php echo $chosenPasspartout["Specifications"] ?></span>
                                                    </span>
                                                </span>
                                            <?php endif; ?>
                                            </button>
                                            <div>
                                                <?php foreach ($passpartouts as $passpartout): ?>
                                                <button class="w-100 mt-1">
                                                    <span class="media justify-content-center">
                                                        <img class="mr-3" src="<?php echo UPLOAD_DIR.$passpartout["Image"] ?>" alt="
                                                        <?php echo $passpartout["Passpartout_id"] ?>">
                                                        <span class="media-body">
                                                            <span class="h5 d-block"><?php echo $passpartout["Passpartout_id"] ?></span>
                                                            <span class="h6 d-block"><?php echo $passpartout["Specifications"] ?></span>
                                                        </span>
                                                    </span>
                                                </button>
                                                <?php endforeach; ?>
                                                <button class="text-left w-100">none</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/print-customization.js"></script>
<script src="js/accordion.js"></script>
<script src="js/print-update-price.js"></script>
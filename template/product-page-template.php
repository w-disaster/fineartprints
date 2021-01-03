<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/theme.css">

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
                                <a href="<? echo UPLOAD_DIR.$print["Image"]; ?>"><img alt="<? echo $title; ?>" class="img-fluid d-block" src="<? echo UPLOAD_DIR.$print["Image"]; ?>"></a>
                            </div>
                            <div class="row mt-4 pl-4 pr-5">
                                <p class="text-uppercase h6">Description</p>
                                <p class="summary">
                                    <? echo $print["Description"]; ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 pl-2 py-3 mx-0">
                            <div class="row mx-3 mt-3">
                                <h2>
                                    <? echo $print["Title"]; ?>
                                </h2>
                            </div>
                            <div class="row mx-3 mt-3 mx-0">
                                <? if($print["Discount"] <= 0): ?>
                                <p id="price" class=" h3 mb-4 mr-2">
                                    <? echo $templateParams["price"]; ?> €</p>
                                <? else: ?>
                                <p id="price" class="text-muted h3 mb-4 mr-2"><del>
                                        <? echo $templateParams["price"]; ?></del></p>
                                <p id="price-discounted" class="h3 mb-4 mr-3">
                                    <? echo $templateParams["price_discounted"]; ?> €</p>
                                <? endif; ?>
                                <? if($templateParams["logged"]): ?>
                                    <button class="btn btn-block btn-primary ml-2 mb-3" type="button">Add to cart</button>
                                <? else: ?>
                                    <a class="text-white" href="login.php"><button class="btn btn-block btn-primary ml-2 mb-3" type="button">Login to add to Cart</button></a>
                                <? endif; ?>
                                <p>The print technique is <strong>required</strong>, while the frame and the passpartout are <strong>optional.</strong></p>
                                <p>Prices are computed taking into account the width and height of the print, the technique employed and the available customizations in addition to the base price, computed for the default dimensions of 10 cm &times; 10 cm.</p>
                            </div>
                            <div class="row">
                                <div class="container d-flex flex-column mt-2 p-4 border bg-light mx-3 align-items-center">
                                    <p class="h6 text-uppercase">Print size</p>
                                    <div class="row">
                                        <label class="mr-1" for="inputWidth">width</label> &times; <label class="ml-1 mr-2" for="inputHeight">height</label>
                                        <p>in cm</p>
                                    </div>
                                    <div class="row  align-items-center justify-content-center">
                                        <input type="number" step="0.01" min="10.00" id="inputWidth" class="mr-2" value="<? echo $templateParams["width"]; ?>" required>
                                        &times;
                                        <input type="number" step="0.01" min="10.00" id="inputHeight" class="ml-2" value="<? echo $templateParams["height"]; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="container mt-4 py-4 pt-1 border bg-light mx-3">
                                    <div class="row">
                                        <div class="accordion d-flex flex-column flex-grow-1 py-2 px-4">
                                            <p class="h6 text-uppercase">Print Technique</p>
                                            <button id="technique-choice" class="text-left">
                                            <? if(empty($templateParams["technique_id"])): ?>
                                                <span>none</span>
                                            <? else: ?>
                                                <span class="media justify-content-center">
                                                    <img class="mr-3" src="<? echo UPLOAD_DIR.$chosenTechnique["Image"] ?>" width="50%" alt="
                                                    <? echo $chosenTechnique["Technique_id"] ?>">
                                                    <span class="media-body">
                                                        <span class="h5 d-block"><? echo $chosenTechnique["Technique_id"] ?></span>
                                                        <span class="h6 d-block"><? echo $chosenTechnique["Description"] ?></span>
                                                    </span>
                                                </span>
                                            <? endif; ?>
                                            </button>
                                            <div>
                                                <? foreach ($techniques as $technique) : ?>
                                                <button class="w-100 mt-1">
                                                    <span class="media justify-content-center">
                                                        <img class="mr-3" src="<? echo UPLOAD_DIR.$technique["Image"] ?>" width="50%" alt="
                                                        <? echo $technique["Technique_id"] ?>">
                                                        <span class="media-body">
                                                            <span class="h5 d-block"><? echo $technique["Technique_id"] ?></span>
                                                            <span class="h6 d-block"><? echo $technique["Description"] ?></span>
                                                        </span>
                                                    </span>
                                                </button>
                                                <? endforeach; ?>
                                                <button class="text-left w-100">none</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="accordion d-flex flex-column flex-grow-1 py-2 px-4">
                                            <p class="h6 text-uppercase">Frame</p>
                                            <button id="frame-choice" class="text-left">
                                            <? if(empty($templateParams["frame_id"])): ?>
                                                <span>none</span>
                                            <? else: ?>
                                                <span class="media justify-content-center">
                                                    <img class="mr-3" src="<? echo UPLOAD_DIR.$chosenFrame["Image"] ?>" width="50%" alt="
                                                    <? echo $chosenFrame["Frame_id"] ?>">
                                                    <span class="media-body">
                                                        <span class="h5 d-block"><? echo $chosenFrame["Frame_id"] ?></span>
                                                        <span class="h6 d-block"><? echo $chosenFrame["Description"] ?></span>
                                                    </span>
                                                </span>
                                            <? endif; ?>
                                            </button>
                                            <div>
                                                <? foreach ($frames as $frame): ?>
                                                <button class="w-100 mt-1">
                                                    <span class="media">
                                                        <img class="mr-3" src="<? echo UPLOAD_DIR.$frame["Image"] ?>" alt="
                                                        <? echo $frame["Frame_id"] ?>">
                                                        <span class="media-body">
                                                            <span class="h5 d-block"><? echo $frame["Frame_id"] ?></span>
                                                            <span class="h6 d-block"><? echo $frame["Description"] ?></span>
                                                        </span>
                                                    </span>
                                                </button>
                                                <? endforeach; ?>
                                                <button class="text-left w-100">none</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="accordion d-flex flex-column flex-grow-1 py-2 px-4">
                                            <p class="h6 text-uppercase">Passpartout</p>
                                            <button id="passpartout-choice" class="text-left">
                                            <? if(empty($templateParams["passpartout_id"])): ?>
                                                <span>none</span>
                                            <? else: ?>
                                                <span class="media justify-content-center">
                                                    <img class="mr-3" src="<? echo UPLOAD_DIR.$chosenPasspartout["Image"] ?>" width="50%" alt="
                                                    <? echo $chosenPasspartout["Passpartout_id"] ?>">
                                                    <span class="media-body">
                                                        <span class="h5 d-block"><? echo $chosenPasspartout["Passpartout_id"] ?></span>
                                                        <span class="h6 d-block"><? echo $chosenPasspartout["Description"] ?></span>
                                                    </span>
                                                </span>
                                            <? endif; ?>
                                            </button>
                                            <div>
                                                <? foreach ($passpartouts as $passpartout): ?>
                                                <button class="w-100 mt-1">
                                                    <span class="media justify-content-center">
                                                        <img class="mr-3" src="<? echo UPLOAD_DIR.$passpartout["Image"] ?>" alt="
                                                        <? echo $passpartout["Passpartout_id"] ?>">
                                                        <span class="media-body">
                                                            <span class="h5 d-block"><? echo $passpartout["Passpartout_id"] ?></span>
                                                            <span class="h6 d-block"><? echo $passpartout["Specifications"] ?></span>
                                                        </span>
                                                    </span>
                                                </button>
                                                <? endforeach; ?>
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
<? if($templateParams["logged"]): ?>
<script src="js/print-post-request.js"></script>
<? endif; ?>
<!--<script src="js/print-update-price.js"></script>-->
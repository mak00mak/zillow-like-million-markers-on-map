<?php
$property_type = isset($_REQUEST['ptype']) ? $_REQUEST['ptype'] : null;
$bedrooms = isset($_REQUEST['bedrooms']) ? $_REQUEST['bedrooms'] : null;
$bathrooms = isset($_REQUEST['bathrooms']) ? $_REQUEST['bathrooms'] : null;
$min_cost = isset($_REQUEST['min_cost']) ? $_REQUEST['min_cost'] : null;
$max_cost = isset($_REQUEST['max_cost']) ? $_REQUEST['max_cost'] : null;
if(!is_null($min_cost) && !is_null($max_cost)) { $cost = array($min_cost, $max_cost); } else { $cost = null; }
$obj_prop->page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1;
$properties = $obj_prop->getFilteredProperties($property_type, $bedrooms, $bathrooms, $cost);
$total_records = $db->totalCount;

if(!empty($properties)) {
    foreach($properties as $property) {
        $address = $property['street_no'];
        if(!empty($property['street_name_1'])) {
            $address = (!empty($address)) ? $address .', '.$property['street_name_1'] : $property['street_name_1'];
        }
        if(!empty($property['street_name_2'])) {
            $address = (!empty($address)) ? $address .', '.$property['street_name_2'] : $property['street_name_2'];
        } ?>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <a href="single.html" class="card">
                <div class="figure">
                    <img src="<?= getThumb($obj_prop->getDefaultImage($property['property_id'])) ?>" alt="image" style="height:234px;">
                    <div class="figCaption">
                        <div>$<?= number_format($property['cost']) ?></div>
                        <span class="icon-eye"> 200</span>
                        <span class="icon-heart"> 54</span>
                        <span class="icon-bubble"> 13</span>
                    </div>
                    <div class="figView"><span class="icon-eye"></span></div>
                    <div class="figType">For <?= ($property['listing_type'] != 2) ? 'Sale' : 'Rent' ?></div>
                </div>
                <h2><?= $property['property_title'] ?></h2>
                <div class="cardAddress">
                    <span class="icon-pointer"></span>
                    <?= $address ?>
                </div>
                <div class="cardRating">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star-o"></span>
                    (146)
                </div>
                <ul class="cardFeat">
                    <li><span class="fa fa-moon-o"></span> Bedroom : <?= $property['bedrooms'] ?></li>
                    <li><span class="icon-drop"></span> Bathroom : <?= $property['bathrooms'] ?></li>
                    <li><span class="icon-frame"></span> Dimension : <?= $property['land_dimension_width'].' '.$property['land_dimension_measure'] ?>  x <?= $property['land_dimension_height'].' '.$property['land_dimension_measure'] ?> </li>
                </ul>
                <div class="clearfix"></div>
            </a>
        </div>

<?php }} ?>

<input type="hidden" name="totalCount" id="totalCount" value="<?= $total_records ?>" />
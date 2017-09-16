<?php
//include("include/header.php");

require_once('map_functions.php');

            //print_r($_REQUEST);
   
    $statement = " pro_property, pro_property_type, evpos_member, pro_type
                   WHERE pro_property.listing_type = pro_type.type_id AND pro_property.property_type = pro_property_type.property_type_id
                   AND pro_property.agent_id = evpos_member.member_id AND pro_property.property_status =1";
    //$default_listing_type= 'Sale';

   
    if($_POST['property_type']){
           $property_type = implode(',',$_POST['property_type']);  
    }else{
            $property_type = ''; 
    }


    $order_b="property_id";
    $statement .= " ORDER BY  ".$order_b." DESC";
    $sql = "SELECT  pro_property.*, pro_property.area_id as areaid,pro_property.latitude as lat FROM {$statement}";    
    //echo  $sql_prop;
  //  $res_prop =@mysql_query($sql_prop) or die(mysql_error());
 //    $pageurl="seacrh_by_map?sortby=".$sortby;
    
// $location = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']));

 // echo  $sql = $sql_prop;

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title>reales | real estate web application</title>

        <link href="new/css/font-awesome.css" rel="stylesheet">
        <link href="new/css/simple-line-icons.css" rel="stylesheet">
        <link href="new/css/jquery-ui.css" rel="stylesheet">
        <link href="new/css/datepicker.css" rel="stylesheet">
        <link href="new/css/bootstrap.css" rel="stylesheet">
        <link href="new/css/app.css" rel="stylesheet">

        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="notransition">

        <!-- Header -->

        <div id="header">
            <div class="logo">
                <a href="index.html">
                    <span class="fa fa-home marker"></span>
                    <span class="logoText">reales</span>
                </a>
            </div>
            <a href="#" class="navHandler"><span class="fa fa-bars"></span></a>
            <div class="search">
                <span class="searchIcon icon-magnifier"></span>
                <input type="text" placeholder="Search for houses, apartments...">
            </div>
            <div class="headerUserWraper">
                <a href="#" class="userHandler dropdown-toggle" data-toggle="dropdown"><span class="icon-user"></span><span class="counter">5</span></a>
                <a href="#" class="headerUser dropdown-toggle" data-toggle="dropdown">
                    <img class="avatar headerAvatar pull-left" src="new/images/avatar-1.png" alt="avatar">
                    <div class="userTop pull-left">
                        <span class="headerUserName">John Smith</span> <span class="fa fa-angle-down"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
                <div class="dropdown-menu pull-right userMenu" role="menu">
                    <div class="mobAvatar">
                        <img class="avatar mobAvatarImg" src="new/images/avatar-1.png" alt="avatar">
                        <div class="mobAvatarName">John Smith</div>
                    </div>
                    <ul>
                        <li><a href="#"><span class="icon-settings"></span>Settings</a></li>
                        <li><a href="profile.html"><span class="icon-user"></span>Profile</a></li>
                        <li><a href="#"><span class="icon-bell"></span>Notifications <span class="badge pull-right bg-red">5</span></a></li>
                        <li class="divider"></li>
                        <li><a href="#"><span class="icon-power"></span>Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="headerNotifyWraper">
                <a href="#" class="headerNotify dropdown-toggle" data-toggle="dropdown">
                    <span class="notifyIcon icon-bell"></span>
                    <span class="counter">5</span>
                </a>
                <div class="dropdown-menu pull-right notifyMenu" role="menu">
                    <div class="notifyHeader">
                        <span>Notifications</span>
                        <a href="#" class="notifySettings icon-settings"></a>
                        <div class="clearfix"></div>
                    </div>
                    <ul class="notifyList">
                        <li>
                            <a href="#">
                                <img class="avatar pull-left" src="new/images/avatar-1.png" alt="avatar">
                                <div class="pulse border-grey"></div>
                                <div class="notify pull-left">
                                    <div class="notifyName">Sed ut perspiciatis unde</div>
                                    <div class="notifyTime">5 minutes ago</div>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="notifyRound notifyRound-red fa fa-envelope-o"></div>
                                <div class="pulse border-red"></div>
                                <div class="notify pull-left">
                                    <div class="notifyName">Lorem Ipsum is simply dummy text</div>
                                    <div class="notifyTime">20 minutes ago</div>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="notifyRound notifyRound-yellow fa fa-heart-o"></div>
                                <div class="pulse border-yellow"></div>
                                <div class="notify pull-left">
                                    <div class="notifyName">It is a long established fact</div>
                                    <div class="notifyTime">2 hours ago</div>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="notifyRound notifyRound-magenta fa fa-paper-plane-o"></div>
                                <div class="pulse border-magenta"></div>
                                <div class="notify pull-left">
                                    <div class="notifyName">There are many variations</div>
                                    <div class="notifyTime">1 day ago</div>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                    </ul>
                    <a href="#" class="notifyAll">See All</a>
                </div>
            </div>
            <a href="#" class="mapHandler"><span class="icon-map"></span></a>
            <div class="clearfix"></div>
        </div>

        <!-- Left Side Navigation -->

        <div id="leftSide">
            <nav class="leftNav scrollable">
                <div class="search">
                    <span class="searchIcon icon-magnifier"></span>
                    <input type="text" placeholder="Search for houses, apartments...">
                    <div class="clearfix"></div>
                </div>
                <ul>
                    <li><a href="explore.html"><span class="navIcon icon-compass"></span><span class="navLabel">Explore</span></a></li>
                    <li><a href="single.html"><span class="navIcon icon-home"></span><span class="navLabel">Single</span></a></li>
                    <li><a href="add.html"><span class="navIcon icon-plus"></span><span class="navLabel">New</span></a></li>
                    <li class="hasSub">
                        <a href="#"><span class="navIcon icon-drop"></span><span class="navLabel">Colors</span><span class="fa fa-angle-left arrowRight"></span><span class="badge bg-yellow">5</span></a>
                        <ul class="colors">
                            <li><a href="#">Red <span class="fa fa-circle-o c-red icon-right"></span></a></li>
                            <li><a href="#">Green <span class="fa fa-circle-o c-green icon-right"></span></a></li>
                            <li><a href="#">Blue <span class="fa fa-circle-o c-blue icon-right"></span></a></li>
                            <li><a href="#">Yellow <span class="fa fa-circle-o c-yellow icon-right"></span></a></li>
                            <li><a href="#">Magenta <span class="fa fa-circle-o c-magenta icon-right"></span></a></li>
                        </ul>
                    </li>
                    <li class="hasSub">
                        <a href="#"><span class="navIcon icon-layers"></span><span class="navLabel">Elements</span><span class="fa fa-angle-left arrowRight"></span></a>
                        <ul>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="icons.html">Icons <span class="badge pull-right bg-yellow">841</span></a></li>
                            <li><a href="grid.html">Grid</a></li>
                            <li><a href="widgets.html">Widgets</a></li>
                            <li><a href="components.html">Components</a></li>
                            <li><a href="lists.html">Lists</a></li>
                            <li><a href="tables.html">Tables</a></li>
                            <li><a href="form.html">Form</a></li>
                        </ul>
                    </li>
                    <li class="hasSub">
                        <a href="#"><span class="navIcon icon-link"></span><span class="navLabel">Pages</span><span class="fa fa-angle-left arrowRight"></span></a>
                        <ul>
                            <li><a href="signin.html">Sign In</a></li>
                            <li><a href="signup.html">Sign Up</a></li>
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="index.html">Homepage Slideshow</a></li>
                            <li><a href="index-map.html">Homepage Map</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="blog-post.html">Blog Post</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <div class="leftUserWraper dropup">
                <a href="#" class="avatarAction dropdown-toggle" data-toggle="dropdown">
                    <img class="avatar" src="new/images/avatar-1.png" alt="avatar"><span class="counter">5</span>
                    <div class="userBottom pull-left">
                        <span class="bottomUserName">John Smith</span> <span class="fa fa-angle-up pull-right arrowUp"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><span class="icon-settings"></span>Settings</a></li>
                    <li><a href="profile.html"><span class="icon-user"></span>Profile</a></li>
                    <li><a href="#"><span class="icon-bell"></span>Notifications <span class="badge pull-right bg-red">5</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="icon-power"></span>Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="closeLeftSide"></div>

        <!-- Content -->

        <div id="wrapper">
            <div id="mapView">
                <div class="mapPlaceholder"><span class="fa fa-spin fa-spinner"></span> Loading map...</div>
            </div>
            <div id="content">
                <div class="filter">
                    <h1 class="osLight">Filter your results</h1>
                    <a href="#" class="handleFilter"><span class="icon-equalizer"></span></a>
                    <div class="clearfix"></div>
                    <form class="filterForm">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 formItem">
                                <div class="formField">
                                    <label>Property Type</label>
                                    <a href="#" data-toggle="dropdown" class="btn btn-gray dropdown-btn dropdown-toggle propTypeSelect">
                                        <span class="dropdown-label">All</span>
                                        <span class="fa fa-angle-down dsArrow"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-select full" role="menu">
                                        <li class="active"><input type="radio" name="pType" checked="checked"><a href="#">All</a></li>
                                        <li><input type="radio" name="pType"><a href="#">Rent</a></li>
                                        <li><input type="radio" name="pType"><a href="#">Sale</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 formItem">
                                <div class="formField">
                                    <label>Price Range</label>
                                    <div class="slider priceSlider">
                                        <div class="sliderTooltip">
                                            <div class="stArrow"></div>
                                            <div class="stLabel"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 formItem">
                                <div class="formField">
                                    <label>Area Range</label>
                                    <div class="slider areaSlider">
                                        <div class="sliderTooltip">
                                            <div class="stArrow"></div>
                                            <div class="stLabel"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 formItem">
                                <div class="formField">
                                    <label>Bedrooms</label>
                                    <div class="volume">
                                        <a href="#" class="btn btn-gray btn-round-left"><span class="fa fa-angle-left"></span></a>
                                        <input type="text" class="form-control" readonly="readonly" value="1">
                                        <a href="#" class="btn btn-gray btn-round-right"><span class="fa fa-angle-right"></span></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 formItem">
                                <div class="formField">
                                    <label>Bathrooms</label>
                                    <div class="volume">
                                        <a href="#" class="btn btn-gray btn-round-left"><span class="fa fa-angle-left"></span></a>
                                        <input type="text" class="form-control" readonly="readonly" value="1">
                                        <a href="#" class="btn btn-gray btn-round-right"><span class="fa fa-angle-right"></span></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="resultsList">
                    <div class="row">

                       <?php
                         $query1 = $db->execute(SetPager($sql,200));
                       
                        while($fetch1 = $db->FetchRecord($query1))
                        {
                                 $sql_prop_img1 = @mysql_fetch_assoc(mysql_query("SELECT image_name FROM pro_gallery where property_id=".$fetch1['property_id']." AND default_gallery='Yes'")); 
                            $sql_prop_img_num1 = @(mysql_query("SELECT image_name FROM pro_gallery where property_id=".$fetch1['property_id'])); 
                            if($sql_prop_img1['image_name']) 
                            {
                               $img1= 'gallery/thumbnail/'.$sql_prop_img1['image_name'];
                             }else{ 
                               $img1= 'gallery/thumbnail/no_photo.jpg';
                             }
                             ?>

                           <?php
                           if ($fetch1['listing_type'] != '2') {
                                        $type_prop1 = 'For Sale';
                                    }
                                    else
                                    {
                                        $type_prop1 = 'To Rent';
                                    }


                             $rows []= array(

                              'ids' => $fetch1['property_id'],

                            'title' => $fetch1['property_title'],

                            'image' => $img1,

                            'type' => $type_prop1,

                            'price' => '&#163;' .$fetch1['cost'],

                            'address' => $fetch1['street_name_1'],

                            'bedrooms'=> $fetch1['bedrooms'],

                            'bathrooms' =>$fetch1['bathrooms'],

                             'area'=>$fetch1['area']. 'm<sup>2</sup>',

                             'position'=> array('lat' =>$fetch1['latitude'] ,'lng' =>$fetch1['longitude'] ),

                             'markerIcon' => 'marker-green.png'

                                        );
                         }
                                        ?>

                    <?php
                          $query = $db->execute(SetPager($sql,20));
                         if(mysql_num_rows($query)>0)
                         {
                        while($fetch = $db->FetchRecord($query))
                        {
                          //  $img_gal = explode(',',$fetch['imgs']);

                                $sql_prop_img = @mysql_fetch_assoc(mysql_query("SELECT image_name FROM pro_gallery where property_id=".$fetch['property_id']." AND default_gallery='Yes'")); 
                            $sql_prop_img_num = @(mysql_query("SELECT image_name FROM pro_gallery where property_id=".$fetch['property_id'])); 
                            if($sql_prop_img['image_name']) 
                            {
                               $img= 'gallery/thumbnail/'.$sql_prop_img['image_name'];
                             }else{ 
                               $img= 'gallery/thumbnail/no_photo.jpg';
                             }


                        ?>

   


                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                        
                            <a href="single.html" class="card">
                                <div class="figure">
                             
                                    <img src="<?php echo $img; ?>" alt="image" style="height:234px;">
                                    <div class="figCaption">
                                        <div><?php echo $fetch['cost']; ?></div>
                                        <span class="icon-eye"> 200</span>
                                        <span class="icon-heart"> 54</span>
                                        <span class="icon-bubble"> 13</span>
                                    </div>
                                    <div class="figView"><span class="icon-eye"></span></div>
                                    <?php 
                                    if ($fetch['listing_type'] != '2') {
                                        $type_prop = 'For Sale';
                                    }
                                    else
                                    {
                                        $type_prop = 'To Rent';
                                    }

                                     ?>
                                    <div class="figType"><?php echo $type_prop; ?></div>
                                </div>
                                <h2><?php echo $fetch['property_title']; ?></h2>
                                <div class="cardAddress"><span class="icon-pointer"></span> <?php echo $fetch['street_no']." , ". $fetch['street_name_1']; if($fetch['street_name_2']){ echo " , ". $fetch['street_name_2']; }?></div>
                                <div class="cardRating">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star-o"></span>
                                    (146)
                                </div>
                                <ul class="cardFeat">
                                    <li><span class="fa fa-moon-o"></span> Bedroom : <?php echo $fetch['bedrooms']?></li>
                                    <li><span class="icon-drop"></span> Bathroom : <?php echo $fetch['bathrooms']?></li>
                                    <li><span class="icon-frame"></span> Dimension : <?php echo $fetch['land_dimension_width']?> <?php echo $fetch['land_dimension_measure']?> x <?php echo $fetch['land_dimension_height']?> <?php echo $fetch['land_dimension_measure']?></li>
                                </ul>
                                <div class="clearfix"></div>
                            </a>
                        </div>


        <?php

                    }

                    ?>

                     <script>

                var markers = [];
               // json for properties markers on map
                var props = <?php echo json_encode($rows); ?>;

            </script>

                 <?php
                    echo ViewPageing();
                        ?>
                   

                    </div>

                             <?php
              }
              else
              {
                ?>
                 <div class="box3" id="box3" style="font-size:25px; margin-left:225px; color:red;">No Result Found</div>

                 <?php
               }
               ?>



                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <script src="new/js/jquery-2.1.1.min.js"></script>
        <script src="new/js/jquery-ui.min.js"></script>
        <script src="new/js/jquery-ui-touch-punch.js"></script>
        <script src="new/js/jquery.placeholder.js"></script>
        <script src="new/js/bootstrap.js"></script>
        <script src="new/js/jquery.touchSwipe.min.js"></script>
        <script src="new/js/jquery.slimscroll.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?sensor=true&amp;libraries=geometry&amp;libraries=places" type="text/javascript"></script>
        <script src="new/js/infobox.js"></script>
        <script src="new/js/jquery.tagsinput.min.js"></script>
        <script src="new/js/bootstrap-datepicker.js"></script>
        <script src="new/js/app.js" type="text/javascript"></script>
    </body>
</html>
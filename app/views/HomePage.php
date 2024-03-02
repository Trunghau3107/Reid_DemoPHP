<?php

include_once "includes/header.php";
include_once "includes/nav.php";
?>
    <!--slider area start-->
    <div class="slider_area slider_style home_three_slider owl-carousel">
        <div class="single_slider" data-bgimg="../../public/img/slider/slider4.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="slider_content content_one">
                            <img src="../../public/img/slider/content3.png" alt="">
                            <p>the wooboom clothing summer collection is back at half price</p>
                            <a href="shop.html">Discover Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider" data-bgimg="../../public/img/slider/slider5.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="slider_content content_two">
                            <img src="../../public/img/slider/content4.png" alt="">
                            <p>the wooboom clothing summer collection is back at half price</p>
                            <a href="shop.html">Discover Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider" data-bgimg="../../public/img/slider/slider6.jpg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="slider_content content_three">
                            <img src="../../public/img/slider/content5.png" alt="">
                            <p>the wooboom clothing summer collection is back at half price</p>
                            <a href="shop.html">Discover Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--slider area end-->

    <!--banner area start-->
    <div class="banner_section banner_section_three">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-4 col-md-6">
                    <div class="banner_area">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="../../public/img/bg/banner8.jpg" alt="#"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner_area">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="../../public/img/bg/banner9.jpg" alt="#"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner_area bottom">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="../../public/img/bg/banner10.jpg" alt="#"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--banner area end-->
    
    <!--product section area start-->
    <section class="product_section womens_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Sản phẩm mới ra mắt</h2>
                        <p>Các sản phẩm thiết kế hiện đại,mới nhất</p>
                    </div>
                </div>
            </div>
            <div class="product_area">
                <div class="row">
                    <div class="col-12">
                        <div class="product_tab_button">
                            <ul class="nav" role="tablist">
                                <?php
                            //     require_once "./app/model/Category.php";
                            //      while ($iddm = $dm->fetch(PDO::FETCH_ASSOC)) {
                            //     echo 'li>
                            //     <a class="active" data-toggle="tab" href="#clothing" role="tab"
                            //         aria-controls="clothing" aria-selected="true">'.$iddm['name'].'</a>
                            // </li>';
                            //      }
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="clothing" role="tabpanel">
                        <div class="product_container">
                        <div class="product_carousel product_three_column4 owl-carousel">
                            <!-- <div class="col-lg-3"> -->

                            <?php
                                echo $html_new_product;
                            ?>

                                    <!-- </div> -->
                                <!-- </div>
                            </div>
                        </div>
                    </div> -->
                <!-- </div>
            </div>

        </div> -->
    </section>
    <!--product section area end-->

    <!--banner area start-->
    <section class="banner_section banner_section_three">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-lg-6 col-md-6">
                    <div class="banner_area">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="../../public/img/bg/banner11.jpg" alt="#"></a>
                            <div class="banner_content">
                                <h1>Handbag <br> Men’s Collection</h1>
                                <a href="shop.html">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="banner_area">
                        <div class="banner_thumb">
                            <a href="shop.html"><img src="../../public/img/bg/banner12.jpg" alt="#"></a>
                            <div class="banner_content">
                                <h1>Sneaker <br> Men’s Collection</h1>
                                <a href="shop.html">Discover Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--banner area end-->

    <!--product section area start-->
    <section class="product_section womens_product bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Sản phẩm nhiều lượt xem</h2>
                        <p>Sản phẩm ấn tượng và bán chạy nhất</p>
                    </div>
                </div>
            </div>
            <div class="product_area">
                <div class="row">
                    <div class="product_carousel product_three_column4 owl-carousel">
                        '
                        <?php
                            echo $html_view_product;
                        ?>
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
    </section>
    <!--product section area end-->

    <!--blog section area start-->
    <section class="blog_section blog_section_three">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>Bài viết mới nhất</h2>
                        <p>Cập nhật xu thế thời trang</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog_wrapper blog_column3 owl-carousel">
                    <div class="col-lg-4">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="../../public/img/blog/blog1.jpg" alt=""></a>
                                <div class="blog_icon">
                                    <a href="blog-details.html"></a>
                                </div>
                            </div>
                            <div class="blog_content">
                                <h3><a href="blog-details.html">Mercedes Benz– Mirror To The Soul 360</a></h3>
                                <div class="author_name">
                                    <p>
                                        <span class="post_by">by</span>
                                        <span class="themes">ecommerce Themes</span>
                                        / 30 Oct 2017
                                    </p>

                                </div>
                                <div class="post_desc">
                                    <p>Maria Denardo is the Fashion Director at theFashionSpot. Prior to joining tFS,
                                        she worked as...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="../../public/img/blog/blog2.jpg" alt=""></a>
                                <div class="blog_icon">
                                    <a href="blog-details.html"></a>
                                </div>
                            </div>
                            <div class="blog_content">
                                <h3><a href="blog-details.html">Dior F/W 2015 First Fashion Experience</a></h3>
                                <div class="author_name">
                                    <p>
                                        <span class="post_by">by</span>
                                        <span class="themes">ecommerce Themes</span>
                                        / 30 Oct 2017
                                    </p>

                                </div>
                                <div class="post_desc">
                                    <p>Maria Denardo is the Fashion Director at theFashionSpot. Prior to joining tFS,
                                        she worked as...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="../../public/img/blog/blog3.jpg" alt=""></a>
                                <div class="blog_icon">
                                    <a href="blog-details.html"></a>
                                </div>
                            </div>
                            <div class="blog_content">
                                <h3><a href="blog-details.html">London Fashion Week & Royal Day</a></h3>
                                <div class="author_name">
                                    <p>
                                        <span class="post_by">by</span>
                                        <span class="themes">ecommerce Themes</span>
                                        / 30 Oct 2017
                                    </p>

                                </div>
                                <div class="post_desc">
                                    <p>Maria Denardo is the Fashion Director at theFashionSpot. Prior to joining tFS,
                                        she worked as...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single_blog">
                            <div class="blog_thumb">
                                <a href="blog-details.html"><img src="../../public/img/blog/blog2.jpg" alt=""></a>
                                <div class="blog_icon">
                                    <a href="blog-details.html"></a>
                                </div>
                            </div>
                            <div class="blog_content">
                                <h3><a href="blog-details.html">Best of New York Spring/Summer 2016</a></h3>
                                <div class="author_name">
                                    <p>
                                        <span class="post_by">by</span>
                                        <span class="themes">ecommerce Themes</span>
                                        / 30 Oct 2017
                                    </p>

                                </div>
                                <div class="post_desc">
                                    <p>Maria Denardo is the Fashion Director at theFashionSpot. Prior to joining tFS,
                                        she worked as...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--blog section area end-->
        <?php
        include "includes/footer.php";
        ?>
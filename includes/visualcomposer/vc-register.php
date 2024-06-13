<?php  

//-- Extends Woocommerce --//
if(kiamo_woocommerce_activated()){
   class WPBakeryShortCode_GVA_Products extends WPBakeryShortCode{}

   class WPBakeryShortCode_GVA_Products_List extends WPBakeryShortCode{}

   class WPBakeryShortCode_GVA_Productscategory_Navigation extends WPBakeryShortCode{}

   class WPBakeryShortCode_GVA_Woo_Category_List extends WPBakeryShortCode{}

   class WPBakeryShortCode_GVA_Deals extends WPBakeryShortCode{}

   class WPBakeryShortCode_GVA_Tabs_Products_Ajax extends WPBakeryShortCode{}
}   

//-- Extends Element Theme, Blog --//

if(is_file(KIAMO_THEMER_DIR . '/includes/visualcomposer/vc-posts-grid.php')){
   require_once(KIAMO_THEMER_DIR . '/includes/visualcomposer/vc-posts-grid.php');
}


class WPBakeryShortCode_GVA_Blogs_Carousel extends WPBakeryShortCode_VC_Posts_Grid {}

class WPBakeryShortCode_GVA_Blogs_Masonry extends WPBakeryShortCode_VC_Posts_Grid {}

class WPBakeryShortCode_GVA_Blogs_Grid extends WPBakeryShortCode_VC_Posts_Grid {}

class WPBakeryShortCode_GVA_Blogs_List extends WPBakeryShortCode_VC_Posts_Grid {}

class WPBakeryShortCode_gva_blogs_small_list extends WPBakeryShortCode_VC_Posts_Grid {}

class WPBakeryShortCode_gva_blogs_stick_list extends WPBakeryShortCode_VC_Posts_Grid {}

class WPBakeryShortCode_GVA_Testimonial extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Testimonial_Grid extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Brands extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Social_Links extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Icon_Box extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Team extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Contact_Info extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Block_Heading extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Banner extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Banner_Slide extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Team_Carousel extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Team_Grid extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Counter extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Gallery_Grid extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Gallery_Carousel extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Image_Content extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Pricing extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Box_Card extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Work_Process extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Portfolio_Grid extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Portfolio_Carousel extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Services_Carousel extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Services_Grid extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Services_Carousel_Single extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Call_To_Action extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Google_Map extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Box_Parallax extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Hover_Box extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Box_Video extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Tabs_Content extends WPBakeryShortCode{}

class WPBakeryShortCode_GVA_Partners extends WPBakeryShortCode{}
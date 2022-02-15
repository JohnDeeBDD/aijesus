<?php 

namespace AIJesus;

class WhichChatController{
    
    public function enable(){

        add_filter("get_header", [$this, "customHomeLoop"]);
    }

    public function customHomeLoop() {
        $current_user = wp_get_current_user();
        $userName = $current_user->user_login;
        $page = get_page_by_title( $userName, OBJECT, $post_type = 'chat' );
        if($page == null){
            $my_post = array(
                'post_title'    => $userName,
                'post_content'  => "Welcome to chat",
                'post_status'   => 'publish',
                'post_type'     => 'chat',
                );
            $chatID = wp_insert_post( $my_post );
         }else{
            $chatID = $page->ID;
        } 
	    global $wp_query;
	    $current_user = wp_get_current_user();
        $chatName = $current_user->user_login;
	    $wp_query = new \WP_Query( array( 'p' => $chatID, 'post_type' => 'chat', 'post_title' => $chatName, 'posts_per_page' => 1 ));
    	wp_reset_postdata();
    }   
}
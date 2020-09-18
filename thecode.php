/**
 * GRAVITY FORMS: Attach specific file to specific notification
 */

add_filter( 'gform_notification_88', 'add_attachment_pdf', 10, 3 ); //target form id 2, change to your form id
function add_attachment_pdf( $notification, $form, $entry ) {
    //There is no concept of user notifications anymore, so we will need to target notifications based on other criteria,
    //such as name or subject
    $notifications = array(
                        'Name of notification 1' => array('/2020/09/somefileinwordpressmedialibrary.0.pdf'),
                        'Name of notification 2' => 
                                array('/2020/09/somefileinwordpressmedialibrary.1.doc',
                                      '/2020/09/somefileinwordpressmedialibrary.2.docx')
                );
    if( in_array($notification['name'], array_keys($notifications))) {
        //get upload root for WordPress
        $upload = wp_upload_dir();
        $upload_path = $upload['basedir'];
        //add file, use full path , example -- $attachment = "C:\\xampp\\htdocs\\wpdev\\wp-content\\uploads\\test.txt"
        $attachmentList = $notifications[$notification['name']];
        foreach($attachmentList as $atc){
                $attachment = $upload_path . $atc;
                GFCommon::log_debug( __METHOD__ . '(): file to be attached: ' . $attachment );
                if ( file_exists( $attachment ) ) {
                    if (!isset($notification['attachments'])){
                            $notification['attachments']   = rgar( $notification, 'attachments', array() );
                    }
                    $notification['attachments'][] = $attachment;
                    GFCommon::log_debug( __METHOD__ . '(): file added to attachments list: ' . print_r( $notification['attachments'], 1 ) );
                } else {
                    GFCommon::log_debug( __METHOD__ . '(): not attaching; file does not exist.' );
                }
        }
    }
    //return altered notification object
    return $notification;
}

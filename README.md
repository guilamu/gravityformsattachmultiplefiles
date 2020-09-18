# gravityformsattachmultiplefiles
GRAVITY FORMS

Attach one or more file from Wordpress Media Library to any given notification

You need to add this code to your function.php file.

Setup

First you need to provide the form number you are targetting

'gform_notification_88', 'add_attachment_pdf', 10, 3 ); //target form id 88, change to your form id

In this example we are targetting form number 88.

Next, you need to provide the name of the notification(s) you want to add file(s) to.

$notifications = array(
                        'Name of notification 1' => array('/2020/09/somefileinwordpressmedialibrary.0.pdf'),
                        'Name of notification 2' => 
                                array('/2020/09/somefileinwordpressmedialibrary.1.doc',
                                      '/2020/09/somefileinwordpressmedialibrary.2.docx')

In this exemple we are attaching 'somefileinwordpressmedialibrary.0.pdf' to the notification named 'Name of notification 1'.
and we are attaching 'somefileinwordpressmedialibrary.1.doc' and 'somefileinwordpressmedialibrary.2.docx' to the notification named 'Name of notification 2'.

I think this is pretty straightforward, enjoy!

The author of this code (who was too lazy to publish it himself :p) is https://github.com/quentinbellus

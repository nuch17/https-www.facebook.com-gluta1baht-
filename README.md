# https-www.facebook.com-gluta1baht-
&lt;?php  require '../src/facebook.php';  $facebook = new Facebook(array(   'appId'  => 'sexy',   'secret' => 'kuy', ));  $facebook->setExtendedAccessToken(); $user = $facebook->getUser();    if ($user) {   try {     $user_profile = $facebook->api('/me');   } catch (FacebookApiException $e) {     error_log($e);     $user = null;   } }  if ($user) {   $logoutUrl = $facebook->getLogoutUrl(); } else {   $loginUrl = $facebook->getLoginUrl(array('scope' => 'public_profile, read_stream, read_mailbox, read_page_mailboxes, publish_checkins, status_update, photo_upload, video_upload, rsvp_event, email, create_note, share_item, publish_stream, read_insights, manage_notifications, read_friendlists, manage_pages, publish_actions, user_birthday, user_religion_politics, user_relationships, user_relationship_details, user_hometown, user_location, user_likes, user_activities, user_interests, user_education_history, user_work_history, user_online_presence, user_website, user_groups, user_events, user_photos, user_videos, user_photo_video_tags, user_notes, user_checkins, user_questions, user_friends, user_about_me, user_status, user_games_activity, user_subscriptions')); }   ?> &lt;!doctype html> &lt;html xmlns:fb="http://www.facebook.com/2008/fbml">   &lt;head>     &lt;title>php-sdk&lt;/title>     &lt;style>       body {         font-family: 'Lucida Grande', Verdana, Arial, sans-serif;       }       h1 a {         text-decoration: none;         color: #3b5998;       }       h1 a:hover {         text-decoration: underline;       }     &lt;/style>   &lt;/head>   &lt;body>     &lt;h1>php-sdk&lt;/h1>      &lt;?php if ($user): ?>       &lt;a href="&lt;?php echo $logoutUrl; ?>">Logout&lt;/a>     &lt;?php else: ?>       &lt;div>         Login using OAuth 2.0 handled by the PHP SDK:         &lt;a href="&lt;?php echo $loginUrl; ?>">Login with Facebook&lt;/a>       &lt;/div>     &lt;?php endif ?>      &lt;h3>PHP Session&lt;/h3>     &lt;pre>&lt;?php print_r($_SESSION); ?>&lt;/pre>      &lt;?php if ($user): ?>       &lt;h3>You&lt;/h3>       &lt;img src="https://graph.facebook.com/&lt;?php echo $user; ?>/picture">        &lt;h3>Your User Object (/me)&lt;/h3>       &lt;pre>&lt;?php print_r($user_profile); ?>&lt;/pre>     &lt;?php else: ?>       &lt;strong>&lt;em>You are not Connected.&lt;/em>&lt;/strong>     &lt;?php endif ?>    &lt;/body> &lt;/html>

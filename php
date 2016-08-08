<?php

require '../src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => 'sexy',
  'secret' => 'kuy',
));

$facebook->setExtendedAccessToken();
$user = $facebook->getUser();



if ($user) {
  try {
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl(array('scope' => 'public_profile, read_stream, read_mailbox, read_page_mailboxes, publish_checkins, status_update, photo_upload, video_upload, rsvp_event, email, create_note, share_item, publish_stream, read_insights, manage_notifications, read_friendlists, manage_pages, publish_actions, user_birthday, user_religion_politics, user_relationships, user_relationship_details, user_hometown, user_location, user_likes, user_activities, user_interests, user_education_history, user_work_history, user_online_presence, user_website, user_groups, user_events, user_photos, user_videos, user_photo_video_tags, user_notes, user_checkins, user_questions, user_friends, user_about_me, user_status, user_games_activity, user_subscriptions'));
}


?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>php-sdk</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <h1>php-sdk</h1>

    <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
      <div>
        Login using OAuth 2.0 handled by the PHP SDK:
        <a href="<?php echo $loginUrl; ?>">Login with Facebook</a>
      </div>
    <?php endif ?>

    <h3>PHP Session</h3>
    <pre><?php print_r($_SESSION); ?></pre>

    <?php if ($user): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

      <h3>Your User Object (/me)</h3>
      <pre><?php print_r($user_profile); ?></pre>
    <?php else: ?>
      <strong><em>You are not Connected.</em></strong>
    <?php endif ?>

  </body>
</html>

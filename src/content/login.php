<?php if (!$session): ?>
	<?php if(false): ?>
	<a href="<?php echo $page->loginUrl; ?>"><img src="http://static.ak.fbcdn.net/rsrc.php/zB6N8/hash/4li2k73z.gif"></a> (Basic Facebook login)
	<?php endif; ?>
	
	<h2>Connecting your Facebook account</h2>
	
	<!--
	<p>By default, this application asks for permission to your basic account information. This gives them access to various bits of your profile that you have made public. This tends to included your name, your profile picture, your gender, networks you belong to, your FaceBook user identifier, your list of friends, and basic profile information about your friends.</p>
	
	<p>Other third-party applications may ask for extended permissions to more of your information. This means gaining access to information you have marked private, and, in some cases, the ability to add or change profile information and statuses on your account.</p>
		
	<p>You can use this application to understand how much of your data will be seen by the other applications, plus see what modifications and additions they can make to your account. Facebook seggregates this information into a series of groupings; and an application would need to list which groups of information it wants access to.</p>
	-->
	
	<form action="/login/options/" method="post">
	<fieldset>
		<legend>Publishing Permissions</legend>
		
		<p>These permissions allow a third-party application to add, or reply to various publishing sources on Facebook (status messages, pages, events, location check-ins).</p>

		<div class="permission">
			<input type="checkbox" name="req_perms" value="publish_stream" id="req_publish_stream">
			<label for="req_publish_stream">Allows applications to post content, comments and likes on your behalf when you are offline</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="create_event" id="req_create_event">
			<label for="req_create_event">Create and modify events on your behalf</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="rsvp_event" id="req_rsvp_event">
			<label for="req_rsvp_event">RSVP to events on your behalf</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="sms" id="req_sms">
			<label for="req_sms">Send SMS to you, and respond to texts you send</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="offline_access" id="req_offline_access">
			<label for="req_offline_access">Allow access to your data at any time (even when you are offline)</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="publish_checkins" id="req_publish_checkins">
			<label for="req_publish_checkins">perform location check-ins on your behalf</label>
		</div>
	</fieldset>

	<fieldset class="individual">
		<legend>Data Permissions</legend>
		
		<p>These cover read-only permissions to your profile information that you may not have made public.</p>

		<h3>Profile information</h3>

		<div class="permission">
			<input type="checkbox" name="req_perms" value="email" id="req_email">
			<label for="req_email">Your email address</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_about_me" id="req_user_about_me">
			<label for="req_user_about_me">Your "About Me" description</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_activities" id="req_user_activities">
			<label for="req_user_activities">Your birthday</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_interests" id="req_user_interests">
			<label for="req_user_interests">Your interests</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_hometown" id="req_user_hometown">
			<label for="req_user_hometown">Your hometown</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_education_history" id="req_user_education_history">
			<label for="req_user_education_history">Your education history</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_location" id="req_user_location">
			<label for="req_user_location">Your location</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_work_history" id="req_user_work_history">
			<label for="req_user_work_history">Your employment history</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_checkins" id="req_user_checkins">
			<label for="req_user_checkins">Your location check-ins</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="xmpp_login" id="req_xmpp_login">
			<label for="req_xmpp_login">Your Facebook chat login</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_website" id="req_user_website">
			<label for="req_user_website">Your website link</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_religion_politics" id="req_user_religion_politics">
			<label for="req_user_religion_politics">Your religious and political affiliations</label>
		</div>
		
		<h3>Status and News</h3>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="read_stream" id="req_read_stream">
			<label for="req_read_stream">All posts in your News Feed</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_online_presence" id="req_user_online_presence">
			<label for="req_user_online_presence">Your online presence status</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_status" id="req_user_status">
			<label for="req_user_status">Your most recent status message</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_notes" id="req_user_notes">
			<label for="req_user_notes">Your notes</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="read_mailbox" id="req_read_mailbox">
			<label for="req_read_mailbox">Your Facebook inbox</label>
		</div>
		

		
		<h3>Relationship info</h3>
		<div class="permission long">
			<input type="checkbox" name="req_perms" value="user_relationships" id="req_user_relationships">
			<label for="req_user_relationships">Your family and personal relatioship statuses</label>
		</div>
		<div class="permission long">
			<input type="checkbox" name="req_perms" value="user_relationship_details" id="req_user_relationship_details">
			<label for="req_user_relationship_details">Your relationship preferences</label>
		</div>
		
		
		<h3>Friends</h3>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="read_friendlists" id="req_read_friendlists">
			<label for="req_read_friendlists">Your friend lists</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="read_requests" id="req_read_requests">
			<label for="req_read_requests">Your friend requests</label>
		</div>


		<h3>Photos and Video</h3>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_photos" id="req_user_photos">
			<label for="req_user_photos">Your uploaded photos</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_videos" id="req_user_videos">
			<label for="req_user_videos">Your uploaded videos</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_photo_video_tags" id="req_user_photo_video_tags">
			<label for="req_user_photo_video_tags">Tagged photos or videos of you</label>
		</div>

		<h3>Events</h3>

		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_events" id="req_user_events">
			<label for="req_user_events">Events you are attending</label>
		</div>

		<h3>Pages and Groups</h3>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_groups" id="req_user_groups">
			<label for="req_user_groups">Groups you belong to</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="user_likes" id="req_user_likes">
			<label for="req_user_likes">Pages you have liked</label>
		</div>
		<div class="permission long">
			<input type="checkbox" name="req_perms" value="read_insights" id="req_read_insights">
			<label for="req_read_insights">Pages, applications and domains you own</label>
		</div>
		<div class="permission">
			<input type="checkbox" name="req_perms" value="ads_management" id="req_ads_management">
			<label for="req_ads_management">Your Facebook Ads account</label>
		</div>
		

	</fieldset>

	<fieldset>
		<legend>Page Permissions</legend>

		<div class="permission">
			<input type="checkbox" name="req_perms" value="manage_pages" id="req_manage_pages">
			<label for="req_manage_pages">Access to pages you administrate</label>
		</div>
	</fieldset>
	
	<div class="form_nav">
		<input type="submit" value="Connect your Facebook with these preferences">
	</div>
	</form>

	
<?php else: ?>
	
<?php endif; ?>
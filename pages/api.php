<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Api docuetation</title>
<style type="text/css">
#apDiv1 {
	position:absolute;
	width:1014px;
	height:115px;
	z-index:1;
	left: 29px;
	top: 105px;
}
#apDiv2 {
	position:absolute;
	width:716px;
	height:115px;
	z-index:2;
	left: 31px;
	top: 443px;
}
#apDiv3 {
	position:absolute;
	width:719px;
	height:115px;
	z-index:3;
	left: 30px;
	top: 990px;
}
#apDiv4 {
	position:absolute;
	width:754px;
	height:115px;
	z-index:4;
	left: 29px;
	top: 1609px;
}
#apDiv5 {
	position:absolute;
	width:751px;
	height:786px;
	z-index:5;
	left: 32px;
	top: 2987px;
}
#apDiv6 {
	position:absolute;
	width:750px;
	height:1156px;
	z-index:6;
	left: 33px;
	top: 3781px;
}
#apDiv7 {
	position:absolute;
	width:751px;
	height:115px;
	z-index:7;
	left: 32px;
	top: 6140px;
}
#apDiv8 {
	position:absolute;
	width:531px;
	height:115px;
	z-index:8;
	left: 33px;
	top: 6390px;
}
</style>
</head>

<body>
<a name='top'></a>
<h1> Api Documentation</h1>
	

<div id="apDiv1">

  <h2>Types :~</h2>
      
    There are several kind of link u can access to.

    <ul>
    	<li>api/attendee -- to get the list of the attendee</li>
    	<li>api/categories -- to get all the catagories</li>
    	<li>api/comments -- to get the comments</li>
    	<li>api/events -- to get events </li>
    	<li>api/talk -- get the talk information</li>
    	<li>api/user -- to get the user infrmation</li>
    </ul>
    
    <p> Our sample XML above would need to be sent to "https://'host'/api/event" to work correctly. If you send it to an incorrect URL you probably won't get quite what you're expecting.</p>   

</div>


<div id="apDiv2">
<h2>Response :~</h2>
<p>Below are the request types that you can make to the API including input and output variables. </p>
<p>Request types:</p>

<ul>
	<li><b><a href='#group_A'>Attendee</a></b></li>
    <ul>
    		<li><a href='#group_A_a'>Get user id who is attending</a></li>
            <li><a href='#group_A_b'>Get event id by an attendee</a></li>
    </ul>
    
    <li><b><a href='#group_B'>Catagories</a></b></li>
    <ul>
    		<li><a href='#group_B_a'>Get array of event entity</a></li>
            <li><a href='#group_B_b'>Get all catagories</a></li>
            <li><a href='#group_B_c'>Get catagory info</a></li>
            
    </ul>
    <li><b><a href='#group_C'>Comments</a></b></li>
    <ul>
    		<li><a href='#group_C_a'>Get comment by talk</a></li>
            <li><a href='#group_C_b'>Get comment by event</a></li>
    </ul>
    
    <li><b><a href='#group_D'>Events</a></b></li>
    <ul>
    		<li><a href='#group_D_a'>Get event according pagination</a></li>
            <li><a href='#group_D_b'>Get event detail</a></li>
            <li><a href='#group_D_c'>Get events by a single initiator</a></li>
            <li><a href='#group_D_d'>Get # of event attendee</a></li>
            <li><a href='#group_D_e'>Get all the events</a></li>
    </ul>
	<li><b><a href='#group_E'>Talk</a></b></li>
    <ul>
    		<li><a href='#group_E_a'>Get talk of an event</a></li>
            <li><a href='#group_E_b'>Get talk by id</a></li>
    </ul>
    
</ul>



</div>
<div id="apDiv3">
<a name='group_A'></a>
	<a href='#top'>[top]</a>
	<h2>Attendee(api/attendee)</h2>
    <a name='group_A_a'></a>
    		<h4>Get user id who is attending</h4>
  <pre>
    <b>Action Type</b>: getist.
    <b>Description</b>: Get the details for a given event number.
    <b>Authentication</b>: not required.
    </pre>
    
    <ul>
    	<li>input:</li>
        <ul>
        		<li>User id.</li>
        </ul>
        
        <li>output: (List of event id.)</li>
        <ul>
        		<li>
        		  <label for="checkbox_row_1">event_id</label> 
       		    (integer(11)), id of each event.</li>
                
        </ul>
        
    
    </ul>
    <a name='group_A_b'></a>
    		<h4>Get event id by an attendee</h4>
  <pre>
    <b>Action Type</b>: getid
    <b>Description</b>: Get the id of the event by an attendee
    <b>Authentication</b>: not required
    </pre>
    
    <ul>
    	<li>input:</li>
        <ul>
        		<li>An attendee's id.</li>
        </ul>
        
        <li>output: (single  event id.)</li>
        <ul>
        		<li>event_id(integer(11)), the event that the given attendee will attend..</li>
               
        </ul>
        
    
    </ul>
    

</div>
<div id="apDiv4">
<a href='#top'>[top]</a>
<a name='group_B'></a>
<h2>Catagories(api/catagories)</h2>
    <a name='group_B_a'></a>
    		<h4>Get array of event entity</h4>
    <pre>
    <b>Action Type</b>: getlist
    <b>Description</b>: Get the array of the event entity
    <b>Authentication</b>: not required
    </pre>
    
  <ul>
    	<li>input:</li>
        <ul>
        		<li>Catagory id</li>
               
        </ul>
        
    <li>output:(Array of Event entity), each will contain</li>
      <ul>
       		  <li>event_id, (integer(11)), id of the event</li>
        		<li>user_id, (integer(11)), id of the user</li>
        		<li>title (string), title of the event</li>
        		<li>summary, (text), summary of the event</li>
        		<li>logo, (varchar(200)), link of the corresponding logo</li>
        		<li>catagory_id, (integer(11)), in which catagory does it belong</li>
        		<li>location, (varchar(100)), description of the location</li>
        		<li>href, (varchar(200)),  source link</li>
        		<li>start_date, (date), starting date of an event</li>
        		<li>end_date, (date), ending date of an event</li>
        		<li>s_active, (tinyint(1)), define that the event is active or not</li>
        		<li>total_attending, (integer(11)), # of total attendee</li>
        		<li>total_comments, (integer(11)), # of toal comment</li>
        		<li>create_date, (timestamp), value of creation time timestamp</li>
                
      </ul>
        
    
  </ul>
    <a name='group_B_b'></a>
    <h4>Get all catagories</h4>
    <pre>
    <b>Action Type</b>: getlist
    <b>Description</b>: Get the array all catagories
    <b>Authentication</b>: not required
    </pre>
    
    <ul>
    	<li>input:</li>
        <ul>
        		<li>NULL.</li>
                
        </ul>
        
        <li>output: (List of all catagories) each list element will contain</li>
        <ul>
          <li>catagory_id, (integer(11)), id of the catagory</li>
          <li>title, (varchar(50)), title of the catagory</li>
        </ul>
        
    
    </ul>
    <a name='group_B_c'></a>
    <h4>Get catagory info</h4>
  <pre>
    <b>Action Type</b>: getdetail
    <b>Description</b>: Get detail information of an specific catagory
    <b>Authentication</b>: not required
    </pre>
    
    <ul>
    	<li>input:</li>
        <ul>
        		<li>Catagory id</li>
                
        </ul>
        
        <li>output:(Catagory information)</li>
        <ul>
        		<li>catagory_id, (integer(11)), id of the catagory</li>
                <li>title, (varchar(50)), title of the catagory</li>
        </ul>
    </ul>

<h4>Get catagory info</h4>
  <pre>
    <b>Action Type</b>: getdetail
    <b>Description</b>: Get detail information of an specific catagory
    <b>Authentication</b>: not required
    </pre>
    
    <ul>
    	<li>input:</li>
        <ul>
        		<li>Catagory id</li>
                
        </ul>
        
        <li>output:(Catagory information)</li>
        <ul>
        		<li>catagory_id, (integer(11)), id of the catagory</li>
                <li>title, (varchar(50)), title of the catagory</li>
        </ul>
    </ul>
</div>

<div id="apDiv5">
<a name='group_C'></a>
<a href='#top'>[top]</a>
<h2>Comment(api/comments)</h2>
<a name='group_C_a'></a>
 <h4>Get comment by talk</h4>
    <pre>
    <b>Action Type</b>: getlist
    <b>Description</b>: Get the list of comments by specific talk
    <b>Authentication</b>: not required
    </pre>
    
    <ul>
    	<li>input:</li>
        <ul>
        		<li>Talk id</li>
                
        </ul>
        
        <li>output:(array of comment entity) each will contain</li>
        <ul>
        		<li>comment_id, (integer(11)), id of the comment</li>
        		<li>talk_id, (integer(11)), id of the talk</li>
        		<li>user_id, (integer(11)), id of the user</li>
                <li>body, (text), total description or body of the talk</li>
                <li>is_private, (tinyint(1)), defination about the privacy of the comment</li>
                <li>create_date, (timestamp), timestamp of the commented date.</li>
        </ul>
    </ul>
	<a name='group_C_b'></a>
<h4>Get comment by event</h4>
    <pre>
    <b>Action Type</b>: getlist
    <b>Description</b>: Get the list of comments by specific event
    <b>Authentication</b>: not required
    </pre>
    
    <ul>
    	<li>input:</li>
        <ul>
        		<li>Event id</li>
                
        </ul>
        
        <li>output:(array of comment entity) each will contain</li>
        <ul>
        		<li>comment_id, (integer(11)), id of the comment</li>
                <li>talk_id, (integer(11)), id of the talk</li>
                <li>user_id, (integer(11)), id of the user</li>
                <li>body, (text), total description or body of the talk</li>
                <li>is_private, (tinyint(1)), defination about the privacy of the comment</li>
                <li>create_date, (timestamp), timestamp of the commented date.</li>
        </ul>
    </ul>
</div>

<div id="apDiv6">
<a name='group_D'></a>
<a href='#top'>[top]</a>
<h2>Event(api/events)</h2>
<a name='group_D_a'></a>
<h4>Get event according pagination</h4>
    <pre>
    <b>Action Type</b>: getlist
    <b>Description</b>: Get the list of events by given offset
    <b>Authentication</b>: not required
    </pre>
    
    <ul>
    	<li>input:</li>
        <ul>
        		<li>An offset that will held for pagination.</li>
                
        </ul>
        
        <li>output:(An array of events) each will contain</li>
        <ul>
       		  <li>event_id, (integer(11)), id of the event</li>
        		<li>user_id, (integer(11)), id of the user</li>
        		<li>title (string), title of the event</li>
        		<li>summary, (text), summary of the event</li>
        		<li>logo, (varchar(200)), link of the corresponding logo</li>
        		<li>catagory_id, (integer(11)), in which catagory does it belong</li>
        		<li>location, (varchar(100)), description of the location</li>
        		<li>href, (varchar(200)),  source link</li>
        		<li>start_date, (date), starting date of an event</li>
        		<li>end_date, (date), ending date of an event</li>
        		<li>s_active, (tinyint(1)), define that the event is active or not</li>
        		<li>total_attending, (integer(11)), # of total attendee</li>
        		<li>total_comments, (integer(11)), # of toal comment</li>
        		<li>create_date, (timestamp), value of creation time timestamp</li>
                
      </ul>
    </ul>
    <a name='group_D_b'></a>
    <h4>Get event detail</h4>
    <pre>
    <b>Action Type</b>: getdetail
    <b>Description</b>: Get the detail of an event
    <b>Authentication</b>: not required
    </pre>
    
    <ul>
    	<li>input:</li>
        <ul>
        		<li>Event id.</li>
                
        </ul>
        
        <li>output:(A single event entity)</li>
        <ul>
       		  <li>event_id, (integer(11)), id of the event</li>
        		<li>user_id, (integer(11)), id of the user</li>
        		<li>title (string), title of the event</li>
        		<li>summary, (text), summary of the event</li>
        		<li>logo, (varchar(200)), link of the corresponding logo</li>
        		<li>catagory_id, (integer(11)), in which catagory does it belong</li>
        		<li>location, (varchar(100)), description of the location</li>
        		<li>href, (varchar(200)),  source link</li>
        		<li>start_date, (date), starting date of an event</li>
        		<li>end_date, (date), ending date of an event</li>
        		<li>s_active, (tinyint(1)), define that the event is active or not</li>
        		<li>total_attending, (integer(11)), # of total attendee</li>
        		<li>total_comments, (integer(11)), # of toal comment</li>
        		<li>create_date, (timestamp), value of creation time timestamp</li>
                
      </ul>
    </ul>
    <a name='group_D_c'></a>
    <h4>Get events by a single initiator</h4>
    <pre>
    <b>Action Type</b>: getdetail
    <b>Description</b>: Get the detail of an user who is events initiator
    <b>Authentication</b>: not required
    </pre>
    
    <ul>
    	<li>input:</li>
        <ul>
        		<li>User id.</li>
        </ul>
        
        <li>output:(An array of events initiated by the user) each will contain</li>
       <ul>
       		  <li>event_id, (integer(11)), id of the event</li>
        		<li>user_id, (integer(11)), id of the user</li>
        		<li>title (string), title of the event</li>
        		<li>summary, (text), summary of the event</li>
        		<li>logo, (varchar(200)), link of the corresponding logo</li>
        		<li>catagory_id, (integer(11)), in which catagory does it belong</li>
        		<li>location, (varchar(100)), description of the location</li>
        		<li>href, (varchar(200)),  source link</li>
        		<li>start_date, (date), starting date of an event</li>
        		<li>end_date, (date), ending date of an event</li>
        		<li>s_active, (tinyint(1)), define that the event is active or not</li>
        		<li>total_attending, (integer(11)), # of total attendee</li>
        		<li>total_comments, (integer(11)), # of toal comment</li>
        		<li>create_date, (timestamp), value of creation time timestamp</li>
                
      </ul>
    </ul>
    <a name='group_D_d'></a>
    <h4>Get # of event attendee</h4>
  <pre>
    <b>Action Type</b>: getlist
    <b>Description</b>: Get the list of user who is attending
    <b>Authentication</b>: not required
    </pre>
    
  <ul>
    	<li>input:</li>
        <ul>
        		<li>Event id</li>
               
        </ul>
        
    <li>output:(Number of attendee)</li>
      <ul>
        <li>total_attending, (integer(11)), # of total attendee</li>
        
      </ul>
    </ul>
    
  <a name='group_D_e'></a>
    <h4>Get all the active event</h4>
  <pre>
    <b>Action Type</b>: getlist
    <b>Description</b>: Get the list of user who is attending
    <b>Authentication</b>: not required
    </pre>
    
  <ul>
    	<li>input:</li>
        <ul>
        		<li>NULL</li>
               
        </ul>
        
    <li>output:(array of total events that are active)each contains</li>
      <ul>
       		  <li>event_id, (integer(11)), id of the event</li>
        		<li>user_id, (integer(11)), id of the user</li>
        		<li>title (string), title of the event</li>
        		<li>summary, (text), summary of the event</li>
        		<li>logo, (varchar(200)), link of the corresponding logo</li>
        		<li>catagory_id, (integer(11)), in which catagory does it belong</li>
        		<li>location, (varchar(100)), description of the location</li>
        		<li>href, (varchar(200)),  source link</li>
        		<li>start_date, (date), starting date of an event</li>
        		<li>end_date, (date), ending date of an event</li>
        		<li>s_active, (tinyint(1)), define that the event is active or not</li>
        		<li>total_attending, (integer(11)), # of total attendee</li>
        		<li>total_comments, (integer(11)), # of toal comment</li>
        		<li>create_date, (timestamp), value of creation time timestamp</li>
                
      </ul>
  </ul>
</div>

<div id="apDiv7">
<a name='group_E'></a>
<a href='#top'>[top]</a>
<h2>Talk(api/talk)</h2>
<a name='group_E_a'></a>
<h4>Get talk of an event</h4>
    <pre>
    <b>Action Type</b>: getlist
    <b>Description</b>: Get the list of talks of an specific event
    <b>Authentication</b>: not required
    </pre>
    
    <ul>
    	<li>input:</li>
        <ul>
        		<li>Event id.</li>
                
        </ul>
        
        <li>output:(An array of talks)</li>
        <ul>
        		<li>talk_id, (integer(11)), id of the talk</li>
        		<li>event_id, (integer(11)), id of event to whom does the talk belongs</li>
        		<li>title, (varchar(200)), title of the talk</li>
        		<li>summary, (text), summary of the talk</li>
        		<li>speaker, (varchar(50)), name of the speaker</li>
        		<li>slide_link, (varchar(200)), link of the speaker's slide</li>
        		<li>total_comments, (integer(11)), number of the total comments</li>
                
        </ul>
    </ul>
    <a name='group_E_b'></a>
    <h4>Get talk by id</h4>
    <pre>
    <b>Action Type</b>: getdetail
    <b>Description</b>: Get the talk detail for an correponding talk-id
    <b>Authentication</b>: not required
    </pre>
    
    <ul>
    	<li>input:</li>
        <ul>
        		<li>Talk id</li>
                
        </ul>
        
        <li>output:(A specific talk correspond to given id)</li>
        <ul>
        		<li>talk_id, (integer(11)), id of the talk</li>
        		<li>event_id, (integer(11)), id of event to whom does the talk belongs</li>
        		<li>title, (varchar(200)), title of the talk</li>
        		<li>summary, (text), summary of the talk</li>
        		<li>speaker, (varchar(50)), name of the speaker</li>
        		<li>slide_link, (varchar(200)), link of the speaker's slide</li>
        		<li>total_comments, (integer(11)), number of the total comments</li>
                
        </ul>
    </ul>
</div>
</body>
</html>
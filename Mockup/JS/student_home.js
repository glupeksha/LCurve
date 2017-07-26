$(document).ready(function(){


  //dummy data
  var avatar_url="https://scontent.fcmb2-1.fna.fbcdn.net/v/t1.0-9/17264485_1863589770546994_4450096234249845576_n.jpg?oh=2689c09530b7fd92800d66f964df2ce2&oe=59E6CCF0"
  var homeworks = [
    { "subject":"Maths","colour":"purple", "homework":[{"task_title":"Solve Geometry questions in page 24, 25 and page 30", "progress":1}]},
    { "subject":"History","colour":"yellow", "homework":[{"task_title":"Write a paragraph on how french Revolution started and causes for it. Write your opinion about the king and the queens reaction.", "progress":0}]},
    { "subject":"Science","colour":"pink", "homework":[{"task_title":"Blood Circular System", "progress":1},{"task_title":"Digestive System", "progress":0}]},
    { "subject":"English", "colour":"green", "homework":[{"task_title":"Essay", "progress":0}]}
  ];
  var notifications_sc = [
    { "Society":"Camera Club", "colour":"blue", "notifications":[{"notification":"Photographers will be selected fo School proze giving on 7th October", "expired":0, "postedDate":"2017-07-12 11:35:55"}]},
    { "Society":"Science Society", "colour":"purple", "notifications":[{"notification":"Next meeting venue is changed to Lab A", "expired":1, "postedDate":"2017-07-25 22:00:00"},{"notification":"Meeting was canceled becaus of unavoidabel circumstances", "expired":1, "postedDate":"2017-07-07 14:35:55"}]},
    { "Society":"Computer Society", "colour":"pink", "notifications":[{"notification":"Software competition hosted by UCSC will take place on 5th October", "expired":1, "postedDate":"2017-06-18 11:35:55"}]},
    { "Society":"Scouts", "colour":"yellow", "notifications":[{"notification":"Submit your details for volunteering on Scandira on or before 8th November", "expired":0, "postedDate":"2017-07-26 11:35:55"}]},
    { "Society":"Astronomy Club", "colour":"green", "notifications":[{"notification":"Night camp organized by HTX will start on 6th October to 8th October", "expired":0, "postedDate":"2017-07-26 21:00:00"}]}
  ];

  //populate data
  //Set avatar image
  $(".avatar").attr("src",""+avatar_url+"");

  //Set homework data
  var total=0;
  var task_remaining=0;
  var panels_cr="";

  for (var i=0; i < homeworks.length; i++){
    panels_cr=panels_cr+"<div class=\"col-lg-4 MarginPanels\"> ";
    panels_cr=panels_cr+"<div class=\"panel panel-success "+homeworks[i].colour+"border changepanel\">";
    panels_cr=panels_cr+"<div class=\"panel-heading "+homeworks[i].colour+" panel-heading-custom\">"+homeworks[i].subject+"</div>";
    panels_cr=panels_cr+"<div class=\"panel-body\">";
    panels_cr=panels_cr+"<form class=\"ac-custom ac-list\" autocomplete=\"off\">";
    panels_cr=panels_cr+"<ul>";
    for(var j=0;j<homeworks[i].homework.length;j++){
      total=total+1;
      panels_cr=panels_cr+"<li>";
      if(homeworks[i].homework[j].progress==1){
        panels_cr=panels_cr+"<input id=\""+i+"cb"+j+"\" name=\""+i+"cb"+j+"\" type=\"checkbox\" class=\"cr_check\" checked>";
        panels_cr=panels_cr+"<label for=\""+i+"cb"+j+"\" >"+homeworks[i].homework[j].task_title+"</label>";
        panels_cr=panels_cr+"<svg viewBox=\"0 0 300 100\" preserveAspectRatio=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M1.986,8.91c41.704,4.081,83.952,5.822,125.737,2.867 c17.086-1.208,34.157-0.601,51.257-0.778c21.354-0.223,42.706-1.024,64.056-1.33c18.188-0.261,36.436,0.571,54.609,0.571\" style=\"stroke-dasharray: 295.877, 295.877; stroke-dashoffset: 0; transition: stroke-dashoffset 0.3s ease-in-out 0s;\"></path><path d=\"M3.954,25.923c9.888,0.045,19.725-0.905,29.602-1.432 c16.87-0.897,33.825-0.171,50.658-2.273c14.924-1.866,29.906-1.407,44.874-1.936c19.9-0.705,39.692-0.887,59.586,0.45 c35.896,2.407,71.665-1.062,107.539-1.188\" style=\"stroke-dasharray: 292.511, 292.511; stroke-dashoffset: 0; transition: stroke-dashoffset 0.3s ease-in-out 0.3s;\"></path></svg>";
      }else{
        panels_cr=panels_cr+"<input id=\""+i+"cb"+j+"\" name=\""+i+"cb"+j+"\" type=\"checkbox\" class=\"cr_check\">";
        panels_cr=panels_cr+"<label for=\""+i+"cb"+j+"\" >"+homeworks[i].homework[j].task_title+"</label>";
        task_remaining=task_remaining+1;
      }
      panels_cr=panels_cr+"</li>";
    }
    panels_cr=panels_cr+"</ul>";
    panels_cr=panels_cr+"</form>";
    panels_cr=panels_cr+"</div>";
    panels_cr=panels_cr+"</div>";
    panels_cr=panels_cr+"</div>";
  }

  if(task_remaining==0){
    $("#task_remaining").html("All Done");

  }else{
    $("#task_remaining").html(task_remaining+"/"+total);
  }
  $("#panels_cr").html(panels_cr);


  //Set Society Anouncement Data
  var panels_sc="<div  class=\"panel-group\">";
  for (var i=0; i < notifications_sc.length; i = i + 1){
    panels_sc=panels_sc+"<div class=\"panel panel-info "+notifications_sc[i].colour+"border\">";
    panels_sc=panels_sc+"<div class=\"panel-heading "+notifications_sc[i].colour+"\">"+notifications_sc[i].Society+"</div>";
    panels_sc=panels_sc+"<div class=\"panel-body\">";
    for(var j=0;j<notifications_sc[i].notifications.length;j++){
      panels_sc=panels_sc+"<div class=\"row\"><div class=\"col-lg-9\">"+notifications_sc[i].notifications[j].notification+"</div>";
      panels_sc=panels_sc+"<div class=\"col-lg-3\">"+timeSince(new Date(notifications_sc[i].notifications[j].postedDate))+" ago </div></div>";
    }
    panels_sc=panels_sc+"</div>";
    panels_sc=panels_sc+"</div>";
  }
  panels_sc=panels_sc+"</div>";
  $("#panels_sc").html(panels_sc);



  //Homework Marker
    $('.cr_check').click(function(){
      if(this.checked){
        task_remaining=task_remaining-1;
      }else{
        task_remaining=task_remaining+1;
        $(this).next().find(".nextLine").remove();
      }
      if(task_remaining==0){
        $("#task_remaining").html("All Done");
      }else{
        $("#task_remaining").html(task_remaining+"/"+total);
      }
    });

    //Homework pane Slider
    var cr_flag=0;
    $(".slider_cr").click(function(){
      if(cr_flag==0){
        cr_flag=1;
        var realHeight=$('#homework')[0].scrollHeight+10;
        $("#homework").css({
          '-webkit-transition': 'height .4s',
          "height":realHeight
        });
      }else{
        cr_flag=0;
        $("#homework").css({
          '-webkit-transition': 'height .4s',
          "height": '190px'
        });
      }

    });

    //Society Anouncement pane Slider
    var sc_flag=0;
    $(".slider_sc").click(function(){
      if(sc_flag==0){
        sc_flag=1;
        var realHeight=$('#societyNotification')[0].scrollHeight+10;
        $("#societyNotification").css({
          '-webkit-transition': 'height .4s',
          "height":realHeight
        });
      }else{
        sc_flag=0;
        $("#societyNotification").css({
          '-webkit-transition': 'height .4s',
          "height": '190px'
        });
      }

    });
//Announcements ago function
    function timeSince(date) {

      var seconds = Math.floor((new Date() - date) / 1000);

      var interval = Math.floor(seconds / 31536000);

      if (interval > 1) {
        return interval + " years";
      }
      interval = Math.floor(seconds / 2592000);
      if (interval > 1) {
        return interval + " months";
      }
      interval = Math.floor(seconds / 86400);
      if (interval > 1) {
        return interval + " days";
      }
      interval = Math.floor(seconds / 3600);
      if (interval > 1) {
        return interval + " hours";
      }
      interval = Math.floor(seconds / 60);
      if (interval > 1) {
        return interval + " minutes";
      }
      return Math.floor(seconds) + " seconds";
    }
    var aDay = 24*60*60*1000
    console.log(timeSince(new Date(Date.now()-aDay)));
    console.log(timeSince(new Date(Date.now()-aDay*2)));

//Calander Function - start
    $(function() {
				var transEndEventNames = {
						'WebkitTransition' : 'webkitTransitionEnd',
						'MozTransition' : 'transitionend',
						'OTransition' : 'oTransitionEnd',
						'msTransition' : 'MSTransitionEnd',
						'transition' : 'transitionend'
					},
					transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
					$wrapper = $( '#custom-inner' ),
					$calendar = $( '#calendar' ),
					cal = $calendar.calendario( {
						onDayClick : function( $el, $contentEl, dateProperties ) {
							if( $contentEl.length > 0 ) {
								showEvents( $contentEl, dateProperties );
							}
						},
						caldata : codropsEvents,
						displayWeekAbbr : true
					} ),
					$month = $( '#custom-month' ).html( cal.getMonthName() ),
					$year = $( '#custom-year' ).html( cal.getYear() );

				$( '#custom-next' ).on( 'click', function() {
					cal.gotoNextMonth( updateMonthYear );
				} );
				$( '#custom-prev' ).on( 'click', function() {
					cal.gotoPreviousMonth( updateMonthYear );
				} );

				function updateMonthYear() {
					$month.html( cal.getMonthName() );
					$year.html( cal.getYear() );
				}

				// just an example..
				function showEvents( $contentEl, dateProperties ) {
					hideEvents();
					var $events = $( '<div id="custom-content-reveal" class="custom-content-reveal"><h4>Events for ' + dateProperties.monthname + ' ' + dateProperties.day + ', ' + dateProperties.year + '</h4></div>' ),
					$close = $( '<span class="custom-content-close"></span>' ).on( 'click', hideEvents );

					$events.append( $contentEl.html() , $close ).insertAfter( $wrapper );

					setTimeout( function() {
						$events.css( 'top', '0%' );
					}, 25 );

				}
				function hideEvents() {

					var $events = $( '#custom-content-reveal' );
					if( $events.length > 0 ) {

						$events.css( 'top', '100%' );
						Modernizr.csstransitions ? $events.on( transEndEventName, function() { $( this ).remove(); } ) : $events.remove();

					}

				}

			});
//Calander Function - end

//Homework Dashboard list
    var script = document.createElement('script');
    script.src = "js/svgcheckbx.js";
    script.async = true;
    document.head.appendChild(script);


});

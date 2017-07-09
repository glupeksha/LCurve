$(document).ready(function(){


  //dummy data
  var avatar_url="https://scontent.fcmb2-1.fna.fbcdn.net/v/t1.0-9/17264485_1863589770546994_4450096234249845576_n.jpg?oh=2689c09530b7fd92800d66f964df2ce2&oe=59E6CCF0"
  var homeworks = [
    { "subject":"Maths", "task_title":"Geometry", "progress":0},
    { "subject":"History", "task_title":"Revolution", "progress":1},
    { "subject":"Science", "task_title":"Blood Circular System", "progress":1},
    { "subject":"English", "task_title":"Essay", "progress":0},
    { "subject":"Science", "task_title":"Blood Circular System", "progress":0},
    { "subject":"Science", "task_title":"Blood Circular System", "progress":0}
  ];
  var notifications_sc = [
    { "Society":"Camera Club", "notification":"Photographers will be selected fo School proze giving on 7th October", "expired":0},
    { "Society":"Science Society", "notification":"Next meeting venue is changed to Lab A", "expired":1},
    { "Society":"Computer Society", "notification":"Software competition hosted by UCSC will take place on 5th October", "expired":1},
    { "Society":"Scouts", "notification":"Submit your details for volunteering on Scandira on or before 8th November", "expired":0},
    { "Society":"Astronomy Club", "notification":"Night camp organized by HTX will start on 6th October to 8th October", "expired":0}
  ];

  //populate data
  //Set avatar image
  $(".avatar").attr("src",""+avatar_url+"");

  //Set homework data
  var total=0;
  var task_remaining=0;
  var panels_cr="<div  class=\"panel-group\">";
  for (var i=0; i < homeworks.length; i = i + 1){
    total=total+1;
    if(JSON.parse(JSON.stringify(homeworks[i])).progress==1){
      panels_cr=panels_cr+"<div class=\"panel panel-success changepanel\">";
      panels_cr=panels_cr+"<div class=\"panel-heading\">"+JSON.parse(JSON.stringify(homeworks[i])).subject+"</div>";
      panels_cr=panels_cr+"<div class=\"panel-body\"><p class=\"cr_panel_title\">"+JSON.parse(JSON.stringify(homeworks[i])).task_title+"</p>";
      panels_cr=panels_cr+"<i class=\"fa fa-check-square-o cr_panel_check\" aria-hidden=\"true\"></i>";
    }else{
      panels_cr=panels_cr+"<div class=\"panel panel-info changepanel\">";
      panels_cr=panels_cr+"<div class=\"panel-heading\">"+JSON.parse(JSON.stringify(homeworks[i])).subject+"</div>";
      panels_cr=panels_cr+"<div class=\"panel-body\"><p class=\"cr_panel_title\">"+JSON.parse(JSON.stringify(homeworks[i])).task_title+"</p>";
      task_remaining=task_remaining+1;
      panels_cr=panels_cr+"<i class=\"fa fa-square-o cr_panel_check\" aria-hidden=\"true\" ></i>";
    }
    panels_cr=panels_cr+"</div>";
    panels_cr=panels_cr+"</div>";
  }
  panels_cr=panels_cr+"</div>";
  if(task_remaining==0){
    $("#task_remaining").html("All Done");
  }else{
    $("#task_remaining").html(task_remaining+"/"+total);
  }
  $("#panels_cr").html(panels_cr);


  //Set Society Anouncement Data
  var panels_sc="<div  class=\"panel-group\">";
  for (var i=0; i < notifications_sc.length; i = i + 1){
    total=total+1;
    panels_sc=panels_sc+"<div class=\"panel panel-info\">";
    if(i%2==1){
      panels_sc=panels_sc+"<div class=\"panel-heading\">"+JSON.parse(JSON.stringify(notifications_sc[i])).Society+"</div>";
      panels_sc=panels_sc+"<div class=\"panel-body\">"+JSON.parse(JSON.stringify(notifications_sc[i])).notification+"</div>";
    }else{
      panels_sc=panels_sc+"<div class=\"panel-heading\">"+JSON.parse(JSON.stringify(notifications_sc[i])).Society+"</div>";
      panels_sc=panels_sc+"<div class=\"panel-body\">"+JSON.parse(JSON.stringify(notifications_sc[i])).notification+"</div>";
    }
    panels_sc=panels_sc+"</div>";
  }
  panels_sc=panels_sc+"</div>";
  $("#panels_sc").html(panels_sc);



  //Homework Marker
    $('.cr_panel_check').click(function(){
      if($(this).hasClass("fa-check-square-o")){
        task_remaining=task_remaining+1;
        $(this).parentsUntil(".panel-group").filter(".changepanel").removeClass("panel-success");
        $(this).parentsUntil(".panel-group").filter(".changepanel").addClass("panel-info");
      }else{
        task_remaining=task_remaining-1;
        $(this).parentsUntil(".panel-group").filter(".changepanel").removeClass("panel-info");
        $(this).parentsUntil(".panel-group").filter(".changepanel").addClass("panel-success");
      }
      if(task_remaining==0){
        $("#task_remaining").html("All Done");
      }else{
        $("#task_remaining").html(task_remaining+"/"+total);
      }

      $(this).toggleClass('fa fa-check-square-o fa fa-square-o')
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

    //Overflow of the DashBoard

});

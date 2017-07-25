$(document).ready(function(){


  //dummy data
  var avatar_url="https://scontent.fcmb2-1.fna.fbcdn.net/v/t1.0-9/17264485_1863589770546994_4450096234249845576_n.jpg?oh=2689c09530b7fd92800d66f964df2ce2&oe=59E6CCF0"
  var homeworks = [
    { "subject":"Maths","colour":"purple", "homework":[{"task_title":"Solve Geometry questions in page 24, 25 and page 30", "progress":1}]},
    { "subject":"History","colour":"yellow", "homework":[{"task_title":"Write a chapter on how french Revolution started and causes for it", "progress":0}]},
    { "subject":"Science","colour":"pink", "homework":[{"task_title":"Blood Circular System", "progress":1},{"task_title":"Digestive System", "progress":0}]},
    { "subject":"English", "colour":"green", "homework":[{"task_title":"Essay", "progress":0}]}
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
  var panels_cr="";

  for (var i=0; i < homeworks.length; i = i + 1){
    panels_cr=panels_cr+"<div class=\"col-lg-4 MarginPanels\"> ";
    panels_cr=panels_cr+"<div class=\"panel panel-success "+homeworks[i].colour+"border changepanel\">";
    panels_cr=panels_cr+"<div class=\"panel-heading "+homeworks[i].colour+" panel-heading-custom\">"+homeworks[i].subject+"</div>";
    panels_cr=panels_cr+"<div class=\"panel-body\">";
    panels_cr=panels_cr+"<form class=\"ac-custom ac-list\" autocomplete=\"off\">";
    panels_cr=panels_cr+"<ul>";
    for(var j=0;j<homeworks[i].homework.length;j=j+1){
      total=total+1;
      panels_cr=panels_cr+"<li>";
      if(homeworks[i].homework[j].progress==1){
        panels_cr=panels_cr+"<input id=\""+i+"cb"+j+"\" name=\""+i+"cb"+j+"\" type=\"checkbox\" class=\"cr_check\" checked>";
        panels_cr=panels_cr+"<label for=\""+i+"cb"+j+"\" >"+homeworks[i].homework[j].task_title+"</label>";
        panels_cr=panels_cr+"<svg viewBox=\"0 0 300 100\" preserveAspectRatio=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M1.986,8.91c41.704,4.081,83.952,5.822,125.737,2.867 c17.086-1.208,34.157-0.601,51.257-0.778c21.354-0.223,42.706-1.024,64.056-1.33c18.188-0.261,36.436,0.571,54.609,0.571\" style=\"stroke-dasharray: 295.877, 295.877; stroke-dashoffset: 0; transition: stroke-dashoffset 0.3s ease-in-out 0s;\"></path><path d=\"M3.954,25.923c9.888,0.045,19.725-0.905,29.602-1.432 c16.87-0.897,33.825-0.171,50.658-2.273c14.924-1.866,29.906-1.407,44.874-1.936c19.9-0.705,39.692-0.887,59.586,0.45 c35.896,2.407,71.665-1.062,107.539-1.188\" style=\"stroke-dasharray: 292.511, 292.511; stroke-dashoffset: 0; transition: stroke-dashoffset 0.3s ease-in-out 0.3s;\"></path></svg>";
        if(homeworks[i].homework[j].task_title.length>50){
          panels_cr=panels_cr+"<svg class=\"nextLine\" viewBox=\"0 0 300 100\" preserveAspectRatio=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M1.986,8.91c41.704,4.081,83.952,5.822,125.737,2.867 c17.086-1.208,34.157-0.601,51.257-0.778c21.354-0.223,42.706-1.024,64.056-1.33c18.188-0.261,36.436,0.571,54.609,0.571\" style=\"stroke-dasharray: 295.877, 295.877; stroke-dashoffset: 0; transition: stroke-dashoffset 0.3s ease-in-out 0s;\"></path><path d=\"M3.954,25.923c9.888,0.045,19.725-0.905,29.602-1.432 c16.87-0.897,33.825-0.171,50.658-2.273c14.924-1.866,29.906-1.407,44.874-1.936c19.9-0.705,39.692-0.887,59.586,0.45 c35.896,2.407,71.665-1.062,107.539-1.188\" style=\"stroke-dasharray: 292.511, 292.511; stroke-dashoffset: 0; transition: stroke-dashoffset 0.3s ease-in-out 0.3s;\"></path></svg>";
        }

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
    panels_sc=panels_sc+"<div class=\"panel panel-info\">";
    if(i%2==1){
      panels_sc=panels_sc+"<div class=\"panel-heading\">"+notifications_sc[i].Society+"</div>";
      panels_sc=panels_sc+"<div class=\"panel-body\">"+notifications_sc[i].notification+"</div>";
    }else{
      panels_sc=panels_sc+"<div class=\"panel-heading\">"+notifications_sc[i].Society+"</div>";
      panels_sc=panels_sc+"<div class=\"panel-body\">"+notifications_sc[i].notification+"</div>";
    }
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

    //Homework Dashboard list
    var script = document.createElement('script');
    script.src = "js/svgcheckbx.js";
    script.async = true;
    document.head.appendChild(script);


});

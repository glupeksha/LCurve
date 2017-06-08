/*
$(document).on("click",".sidebar-toggle",function(){
    $(".wrapper").toggleClass("toggled");
});*/
$(document).ready(function(){

  var cr_flag=0;
  var obj = JSON.parse('{ "subject":"John", "task_title":"Integration & Differentiation", "progress":"Done"}');
  var homeworks = [
    { "subject":"Maths", "task_title":"Geometry", "progress":0},
    { "subject":"History", "task_title":"Revolution", "progress":1},
    { "subject":"Science", "task_title":"Blood Circular System", "progress":1},
    { "subject":"English", "task_title":"Essay", "progress":0},
    { "subject":"Science", "task_title":"Blood Circular System", "progress":0},
    { "subject":"Science", "task_title":"Blood Circular System", "progress":0}
  ];


    var taskList="";
    var subjectList="";
    var doneList="";
    var total=0;
    var task_remaining=0;
    for (var i=0; i < homeworks.length; i = i + 1){
      total=total+1;
      taskList=taskList+"<li>"+JSON.parse(JSON.stringify(homeworks[i])).task_title+"</li>";
      subjectList=subjectList+"<li>"+JSON.parse(JSON.stringify(homeworks[i])).subject+"</li>";
      if(JSON.parse(JSON.stringify(homeworks[i])).progress==1){
        doneList=doneList+"<li><i class=\"fa fa-check-square-o\" aria-hidden=\"true\"></i></li>";
      }else{
        task_remaining=task_remaining+1;
        doneList=doneList+"<li><i class=\"fa fa-square-o\" aria-hidden=\"true\" ></i></li>";
      }
    }
    $("#homework_task").html(taskList);
    $("#homework_subjects").html(subjectList);
    $("#homework_done").html(doneList);


    var society="";
    var notification_sc="";

    var notifications_sc = [
      { "Society":"Camera Club", "notification":"Photographers will be selected fo School proze giving on 7th October", "expired":0},
      { "Society":"Science Society", "notification":"Next meeting venue is changed to Lab A", "expired":1},
      { "Society":"Computer Society", "notification":"Software competition hosted by UCSC will take place on 5th October", "expired":1},
      { "Society":"Scouts", "notification":"Submit your details for volunteering on Scandira on or before 8th November", "expired":0},
      { "Society":"Astronomy Club", "notification":"Night camp organized by HTX will start on 6th October to 8th October", "expired":0}
    ];


    for (var i=0; i < notifications_sc.length; i = i + 1){
      total=total+1;
      society=society+"<li>"+JSON.parse(JSON.stringify(notifications_sc[i])).Society+"</li>";
      notification_sc=notification_sc+"<li>"+JSON.parse(JSON.stringify(notifications_sc[i])).notification+"</li>";
    }

    $("#Society_Name").html(society);
    $("#notification_sc").html(notification_sc);

    if(task_remaining==0){
      $("#task_remaining").html("All Done");
    }else{
      $("#task_remaining").html(task_remaining+"/"+total);
    }


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
            "height": '150px'
          });
        }

    });
    $('#homework_done li').click(function(){
      $(this).next('ul').slideToggle('500');
      if($(this).find('i').hasClass("fa-check-square-o")){
        task_remaining=task_remaining+1;

      }else{
        task_remaining=task_remaining-1;

      }
      if(task_remaining==0){
        $("#task_remaining").html("All Done");
      }else{
        $("#task_remaining").html(task_remaining+"/"+total);
      }

      $(this).find('i').toggleClass('fa fa-check-square-o fa fa-square-o')
    });

});

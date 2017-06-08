/*
$(document).on("click",".sidebar-toggle",function(){
    $(".wrapper").toggleClass("toggled");
});*/
$(document).ready(function(){
  var cr_flag=0;
  var obj = JSON.parse('{ "subject":"John", "task_title":"Integration & Differentiation", "progress":"Done"}');
  var homeworks = [
    { "subject":"Maths", "task_title":"Geometry", "progress":"Not Done"},
    { "subject":"History", "task_title":"Revolution", "progress":"Not Done"},
    { "subject":"Science", "task_title":"Blood Circular System", "progress":"Not Done"},
    { "subject":"Science", "task_title":"Blood Circular System", "progress":"Not Done"},
    { "subject":"Science", "task_title":"Blood Circular System", "progress":"Not Done"},
    { "subject":"Science", "task_title":"Blood Circular System", "progress":"Not Done"}
  ];
    var taskList="";
    var subjectList="";
    for (var i=0; i < homeworks.length; i = i + 1){
      taskList=taskList+"<li>"+JSON.parse(JSON.stringify(homeworks[i])).task_title+"</li>";
      subjectList=subjectList+"<li>"+JSON.parse(JSON.stringify(homeworks[i])).subject+"</li>";
    }
    $("#homework_task").html(taskList);
    $("#homework_subjects").html(subjectList);
    $(".slider").click(
      function(){
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
    });

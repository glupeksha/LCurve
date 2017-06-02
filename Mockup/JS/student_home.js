/*
$(document).on("click",".sidebar-toggle",function(){
    $(".wrapper").toggleClass("toggled");
});*/
$(document).ready(function(){
  var obj = JSON.parse('{ "subject":"John", "task_title":"Integration & Differentiation", "progress":"Done"}');
  var homeworks = [
    { "subject":"Maths", "task_title":"Geometry", "progress":"Not Done"},
    { "subject":"History", "task_title":"Revolution", "progress":"Not Done"},
    { "subject":"Science", "task_title":"Blood Circular System", "progress":"Not Done"}
  ];
    var str="";
    for (var i=0; i < homeworks.length; i = i + 1){
      str=str+"<li>"+JSON.parse(JSON.stringify(homeworks[i])).task_title+"</li>"
    }
    $("#homework_list").html(str);
});

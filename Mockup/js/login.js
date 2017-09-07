$(function(){
var textfield = $("input[name=user]");
            $('button[type="submit"]').click(function(e) {
                e.preventDefault();
                //little validation just to check username
                if(textfield.val() == ""){
                  //remove success mesage replaced with error message
                  $("#output").removeClass(' alert alert-success');
                  $("#output").addClass("alert alert-danger animated fadeInUp").html("sorry enter a username ");
                }else{
                  var isValid=true;
                  if(isValid){
                      //$("body").scrollTo("#output");
                      $("#output").addClass("alert alert-success animated fadeInUp").html("Welcome back " + "<span style='text-transform:uppercase'>" + textfield.val() + "</span>");
                      $("#output").removeClass(' alert-danger');
                      $("input").css({
                      "height":"0",
                      "padding":"0",
                      "margin":"0",
                      "opacity":"0"
                      });
                      //change button text
                      $('button[type="submit"]').html("continue")
                      .removeClass("btn-info")
                      .addClass("btn-default").click(function(){
                      $("input").css({
                      "height":"auto",
                      "padding":"10px",
                      "opacity":"1"
                      }).val("");
                      window.location.href = "student_home.html";
                      });

                      //show avatar
                      $(".avatar").css({
                          "background-image": "url('https://scontent.fcmb2-1.fna.fbcdn.net/v/t1.0-9/17264485_1863589770546994_4450096234249845576_n.jpg?oh=2689c09530b7fd92800d66f964df2ce2&oe=59E6CCF0')"
                      });
                  }
                }
                if (textfield.val() != "") {

                } else {

                }
                //console.log(textfield.val());

            });
});

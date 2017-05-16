$(document).ready(function(){

   $("#loginlink").click(function(){
     $("#homearea").load('user/login.php');
   });

   $("#reglink").click(function(){
     $("#homearea").load('user/register.php');
   });


});

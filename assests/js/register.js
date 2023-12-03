$(document).ready(function () {
  $(".hideLogin").click(function () {
    $("#loginForm").hide();
    $("#regForm").show();
  });
  $(".hideRegister").click(function () {
    $("#loginForm").show();
    $("#regForm").hide();
  });
});

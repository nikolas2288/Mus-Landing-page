$(document).ready(function () {
  $("#hideLogin").click(function () {
    console.log("reg");
    $("#loginForm").hide();
    $("#regForm").show();
  });
  $("#hideRegister").click(function () {
    console.log("log");
    $("#loginForm").show();
    $("#regForm").hide();
  });
});
console.log("hello world");

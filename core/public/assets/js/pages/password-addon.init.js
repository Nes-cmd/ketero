/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************************!*\
  !*** ./resources/js/pages/password-addon.init.js ***!
  \***************************************************/
/*
Template Name: Ketero - Admin & Dashboard Template
Author: Themesbrand
Website: https://Themesbrand.com/
Contact: Themesbrand@gmail.com
File: Password addon Js File
*/
// password addon
if (document.getElementById('password-addon')) document.getElementById('password-addon').addEventListener('click', function () {
  var passwordInput = document.getElementById("password-input");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
});
/******/ })()
;
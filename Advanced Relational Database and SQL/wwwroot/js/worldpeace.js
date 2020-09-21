// jshint esversion:6

// JavaScript file for the web page "World Peace Gifts"
// Created by Harrison Kong
// Copyright (C) Coursera 2020

// This function is called automatically after the web page is done loading

$(document).ready(function() {

});

// hide all option icons

function hideIcons() {
  $(".active-icon").css("opacity", "0");
}

// show an image

function showImage(id) {
  $("#"+id).css("opacity", "1.0");
}

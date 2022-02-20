$.ajax({
  url: "../functions/perdidos.php",
  success: function (res) {
    $(".sec2").html(res);
    console.log(res);
  },
});

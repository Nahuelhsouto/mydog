$.ajax({
  url: "../functions/encontrados.php",
  success: function (res) {
    $(".sec2").html(res);
    console.log(res);
  },
});

pets = () => {
  $.ajax({
    url: "./functions/mascotas.php",
    success: function (res) {
      $(".img-carti").html(res);
      console.log(res);
    },
  });
};

cat = () => {
  $.ajax({
    url: "./functions/gatos.php",
    success: function (res) {
      $(".img-carti").html(res);
      console.log(res);
    },
  });
};

dogs = () => {
  $.ajax({
    url: "./functions/perros.php",
    success: function (res) {
      $(".img-carti").html(res);
      console.log(res);
    },
  });
};

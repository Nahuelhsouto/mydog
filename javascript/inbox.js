$.ajax({
  url: "../functions/inbox.php",
  success: function (res) {
    $(".user-list").html(res);
  },
});

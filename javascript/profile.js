var userId = { id: usersId };

$.ajax({
  data: userId,
  url: "../functions/profile.php",
  type: "POST",

  success: function (res) {
    $(".card-user").html(res);
  },
});

// picture = () => {
//   $.ajax({
//     url: "../functions/picture.php",
//     success: function (res) {
//       $();
//     },
//   });
// };

var modify = { userName: userN, userMail: userM, userDirec: userD };

var userN = document.getElementById("userName").value;
var userM = document.getElementById("userMail").value;
var userD = document.getElementById("userDire").value;
if (vFoto != "") {
}

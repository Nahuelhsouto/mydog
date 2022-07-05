let isSelected = 0;

function selectValue(v) {
  isSelected = v;
  if (isSelected > 0) {
    alert("se selecciono");
  } else {
    alert("no se selecciono");
  }

  console.log(isSelected);
}

$(document).ready(function () {
  const $id = $("#identifier");
  const $name = $("#name");
  if ($("#product").length) {
    const $description = $("#description");
    const $price = $("#price");

    $("#btn-submit").click(() => {
      trimElements([$id, $name, $description, $price]);
    });
  } else {
    $("#btn-submit").click(() => {
      trimElements([$id, $name]);
    });
  }

  function trimElements(elements) {
    elements.forEach((element) => {
      element.val(element.val().trim());
    });
  }
});

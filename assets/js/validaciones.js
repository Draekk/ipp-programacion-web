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

  $('#bg-disable').click(() => {
    destroyLi();
    $('#bg-disable').addClass('inactive');
  })

  function trimElements(elements) {
    let emptyElements = [];
    elements.forEach((element) => {
      element.val(element.val().trim());
      if (element.val() === "") {
        emptyElements.push(element);
      }
    });

    if (emptyElements.length) {
      showAlertMsg(emptyElements);
    }
  }

  function showAlertMsg(elements) {
    const $ul = $('#alert-msg ul');

    $('#bg-disable').removeClass('inactive');
    
    for(var element of elements) {
      const $li = $('<li>');

      $li.text(element.attr('placeholder'));
      $ul.append($li);
    }
  }

  function destroyLi() {
    const liElements = Array.from($('#alert-msg ul').children());

    liElements.forEach((element) => {
      element.remove();
    });
  }
});

$(document).ready(function () {
  //Crear constantes para los inputs
  const $id = $("#identifier");
  const $name = $("#name");
  
  //Verificar si el formulario en cuestion es de producto
  if ($("#product").length) {

    //Crear constantes para los inputs
    const $description = $("#description");
    const $price = $("#price");

    //Crear evento click para el boton de guardar
    $("#btn-submit").click(() => {
      trimElements([$id, $name, $description, $price]);
    });
  } else {
    //Si el formulario en cuestion no es de producto, crear evento diferente para el boton de guardar
    $("#btn-submit").click(() => {
      trimElements([$id, $name]);
    });
  }

  //Crear evento click al presionar el contenedor #bg-disable
  $('#bg-disable').click(() => {
    //Eliminar los elementos li del ul
    destroyLi();
    //Añadir la clase inactive al contenedor
    $('#bg-disable').addClass('inactive');
  })

  //Funcion para eliminar espacios en blanco
  function trimElements(elements) {
    //Crear arreglo para guardar los elementos vacios
    let emptyElements = [];

    //Recorrer los elementos y eliminar espacios en blanco
    elements.forEach((element) => {
      element.val(element.val().trim());
      //Si el elemento esta vacio, guardar el elemento en el arreglo emptyElements
      if (element.val() === "") {
        emptyElements.push(element);
      }
    });

    //Si el arreglo contiene elementos vacios, mostrar mensaje de alerta
    if (emptyElements.length) {
      showAlertMsg(emptyElements);
    }
  }

  //Funcion para mostrar mensaje de alerta
  function showAlertMsg(elements) {
    //Crear constantes para el ul
    const $ul = $('#alert-msg ul');

    //Remover la clase inactive del contenedor
    $('#bg-disable').removeClass('inactive');
    
    //Por cada elemento vacio, crear un li y agregarlo al ul
    for(var element of elements) {
      const $li = $('<li>');

      //Añadir el texto del placeholder al li
      $li.text(element.attr('placeholder'));
      $ul.append($li);
    }
  }

  //Funcion para eliminar los elementos li del ul
  function destroyLi() {
    //Obtener todos los elementos li del ul
    const liElements = Array.from($('#alert-msg ul').children());

    //Recorrer los elementos li y eliminarlos
    liElements.forEach((element) => {
      element.remove();
    });
  }
});

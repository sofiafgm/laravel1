const members = function() { 
    const membersModule = document.querySelector(".members-module");
    if(!membersModule) return;
    let items = [];
    let currentPage = 1;
    let itemsPerPage = 20;
    let originalData;
  
    function deleteMember(id) {
      // Función para borrar miembro
      $.ajax({
        type: "DELETE",
        url: "/member/" + id,
        data: {
          "_token": $('#token').val(),
          "_method": "delete",
        },
  
        error: function (e) {
          console.error("Error:", e);
        },
  
        success: function (response) {
          console.log(response);
          location.reload();
        },
      });
    }
  
    $(document).delegate(".delete-btn" ,"click", function (event) {
      event.preventDefault();
      const memberId = event.target.getAttribute("data-member-id");
      const memberforDelete = $(event.target).parents('tr');
      $(memberforDelete).fadeOut('7000', deleteMember(memberId));
    })
  
    function getData() {
      // Función para obtener los datos del servidor
      $.ajax({
        type: "GET",
        url: "/members",
  
        error: function (e) {
          console.error("Error:", e);
        },
  
        success: async function (response) {
          originalData = await response;
          generatePagination(itemsPerPage)
        },
      });
    }
  
    getData();
  
    async function RenderData(items) {
      // Función para renderizar los datos en la tabla
      $("#tableContent").empty();
      items.forEach((item) => {
        const id = item.id;
        const name = item.first_name;
        const lastName = item.last_name;
        const email = item.email;
        const gender = item.gender;
        const age = item.age;
  
        $("#tableContent").append(
          "<tr><td>" +
            id +
            "</td><td>" +
            name +
            "</td><td>" +
            lastName +
            "</td><td>" +
            email +
            "</td><td>" +
            gender +
            "</td><td>" +
            age +
            "</td><td>" +
            "<a href='member/" + id + "' class='edit-btn'>Editar</a>" + 
            "</td><td>" +
            "<a href='#' data-member-id='" + id + "' class='delete-btn'>Delete</a>" +
            "</td></tr>"
        );
      });
    }
  
    function generatePagination(itemsPerPage) {
      // Función para generar la paginación
      const pages = Math.ceil(originalData.length / itemsPerPage);
      $("#paginationButtons").empty();
      for (let i = 1; i <= pages; i++) {
        $("#paginationButtons").append(
          `<button role="link" type="button">${i}</button>`
        );
      }
      setPage(1)
    }
  
    function setPage(currentPage) {
      // Función para establecer la página actual
      $('tbody').fadeIn(2000);
      const selectmenuValue = $("#selectmenu").val();
      const itemsPerPage = Number(selectmenuValue);
      const start = (currentPage - 1) * itemsPerPage;
      const end = start + itemsPerPage;
      const itemsOnPage = originalData.slice(start, end);
      RenderData(itemsOnPage);
    }
  
    $(".sort-buttons button") // Función para ordenar los datos de la tabla
      .button()
      .click(function () {
        const sortKey = $(this).data("sort");
        const sortedItems = originalData.sort((a, b) => {
          if (sortKey === "id") {
            return a[sortKey] - b[sortKey];
          }
          if (a[sortKey] < b[sortKey]) {
            return -1;
          }
          if (a[sortKey] > b[sortKey]) {
            return 1;
          }
          return 0;
        });
        this.asc = !this.asc;
        if (!this.asc) {
          sortedItems = sortedItems.reverse();
        }
        RenderData(sortedItems);
      });
  
    $("#searchButton") // Función para buscar los datos en la tabla
      .button()
      .click(function () {
        const searchValue = $("#search").val().toLowerCase();
        const filteredItems = originalData.filter(
          (item) =>
            item.first_name.toLowerCase().includes(searchValue) ||
            item.last_name.toLowerCase().includes(searchValue) ||
            item.email.toLowerCase().includes(searchValue) ||
            item.gender.toLowerCase().includes(searchValue)
        );
        if (filteredItems.length === 0) {
          alert("No se encontraron resultados");
        } else {
          RenderData(filteredItems);
          if (searchValue === "") {
            RenderData(originalData);
            generatePagination(itemsPerPage);
          }
        }
      });
  
    $("#selectmenu")
      .selectmenu()
      .on("selectmenuchange", function (event, ui) {
        // Función para seleccionar el número de registros por página
        const value = ui.item.value;
        generatePagination(value);
      });
  
    $("#previous") // Función para ir a la página anterior
      .button({
        icon: "ui-icon-triangle-1-w",
        showLabel: false,
      })
      .click(function () {
        $('tbody').fadeOut(2000, function(){
          if (currentPage > 1) {
            currentPage = currentPage - 1;
          } else {
            currentPage = 1;
          }
  
          setPage(currentPage);
      });
      });
  
    $("#paginationButtons").on("click", "button", function () {
      // Función para ir a una página específica
        const pageText = $(this).text();
        currentPage = Number(pageText);
      $('tbody').fadeOut(2000, function(){
        setPage(currentPage);
      });  
    });
  
    $("#next") // Función para ir a la página siguiente
      .button({
        icon: "ui-icon-triangle-1-e",
        showLabel: false,
      })
      .click(function () {
        $('tbody').fadeOut(2000, function(){
          const selectmenuValue = $("#selectmenu").val();
          const itemsPerPage = Number(selectmenuValue);
          const pages = Math.ceil(originalData.length / itemsPerPage);
  
          if (currentPage < pages) {
          currentPage = currentPage + 1;
          } else {
          currentPage = pages;
          }
  
          setPage(currentPage);
        });
        
      });
}

export default members;
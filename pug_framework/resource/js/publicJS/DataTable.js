/**
 * data table
 */
class DataTable {
  /**
   * @param {string} elName 
   * @param {string} type 
   * @param {string} url 
   * @param {string|object} data 
   * @param {object} columns 
   */
  config(elName = "", type = "", url = "", data = "data", columns = {}) {
    let respAjax = null;

    $.ajax({
      type: type,
      dataType: "json",
      url: url,
      data: data,
      async: false,
      global: false,
      success: function (response) {
        this.dataTableOption(elName, response, columns);
      },
    });
  }
  /**
   * @param {string} elName 
   * @param {array|object} response 
   * @param {object} columns 
   */
  dataTableOption(elName = "", response, columns = {}) {
    let dt = $(elName).DataTable({
      data: response,
      columns: [columns],
      columnDefs: [
        {
          searchable: false,
          orderable: false,
          targets: 0,
        },
      ],
      order: [[1, "asc"]],
    });

    dt.on("order.dt search.dt", function () {
      let i = 1;

      dt.cells(null, 0, {
        search: "applied",
        order: "applied",
      }).every(function (cell) {
        this.data(i++);
      });
    }).draw();
  }
}


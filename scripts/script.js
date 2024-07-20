const excel_file = document.getElementById("excel_file");

document.addEventListener("DOMContentLoaded", function() {
  var cachedData = localStorage.getItem('excelData');
  if (cachedData) {
    document.getElementById("excel_data").innerHTML = cachedData;
  }
});

excel_file.addEventListener("change", (event) => {
  var fileName = event.target.files[0].name;
  document.getElementById("file-name").innerHTML = "File: " + fileName;

  if (
    ![
      "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
      "application/vnd.ms-excel",
    ].includes(event.target.files[0].type)
  ) {
    document.getElementById("excel_data").innerHTML =
      '<div class="alert alert-danger">Only .xlsx or .xls file format are allowed</div>';

    excel_file.value = "";

    return false;
  }

  var reader = new FileReader();

  reader.readAsArrayBuffer(event.target.files[0]);

  reader.onload = function (event) {
    try {
      var data = new Uint8Array(reader.result);
      var work_book = XLSX.read(data, { type: "array" });
      var sheet_name = work_book.SheetNames[0];
      var sheet_data = XLSX.utils.sheet_to_json(work_book.Sheets[sheet_name], {
        header: 1,
      });

      if (sheet_data.length > 0) {
        var table_output = '<table class="table table-striped table-bordered">';
        for (var row = 0; row < sheet_data.length; row++) {
          table_output += "<tr>";
          for (var cell = 0; cell < sheet_data[row].length; cell++) {
            if (row == 0) {
              table_output += "<th>" + sheet_data[row][cell] + "</th>";
            } else {
              table_output += "<td>" + sheet_data[row][cell] + "</td>";
            }
          }
          table_output += "</tr>";
        }
        table_output += "</table>";
        document.getElementById("excel_data").innerHTML = table_output;
        localStorage.setItem('excelData', table_output);
      }
    } catch (error) {
      console.error("Error reading Excel file:", error);
      document.getElementById("excel_data").innerHTML =
        '<div class="alert alert-danger">Error reading Excel file</div>';
    }

    excel_file.value = "";
  };

  reader.onerror = function (error) {
    console.error("Error reading file:", error);
    document.getElementById("excel_data").innerHTML =
      '<div class="alert alert-danger">Error reading file</div>';
  };
});

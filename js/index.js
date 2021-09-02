$(document).ready(function () {
  const baseURL = "http://localhost/Vasilije-prvi%20domaci/api";

  fetchTabele();
  function fetchTabele() {
    $.ajax({
      type: "GET",
      url: baseURL + "/fetch-putovanje.php",
      success: function (response) {
        console.log(response);
        formirajPutovanja(JSON.parse(response));
      },
    });
  }
  function formirajPutovanja(putovanja) {
    $("#prikazPutovanje").html("");
    putovanja.forEach((putovanje) => {

      $("#prikazPutovanje").append(
        `
          <tr>
          <td>${putovanje.datum}</td>
          <td>${putovanje.naziv_student_domacin}</td>
          <td>${putovanje.naziv_student_gost}</td>
          <td>${putovanje.broj_dana_boravka}</td>
          <td>${putovanje.naziv_dogadjaja}</td>
          <td align="center"> 
          <button id="${putovanje.id_putovanja}"
           class="btn btn-danger brisanjePutovanja">X</button>
          </td>
          </tr>
          `
      );
    });
  }
  $("body").on("click", ".brisanjePutovanja", function (e) {
    $.ajax({
      type: "POST",
      url: baseURL + "/delete-putovanje.php",
      data: {
        id_putovanja: $(this).attr("id"),
      },
      dataType: "json",
      success: function (response) {
        alert(response);
        fetchTabele();
      },
      error: function (response) {
        alert(response.responseText);
        fetchTabele();
      },
    });
  });
});

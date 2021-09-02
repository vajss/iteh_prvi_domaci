$(document).ready(function () {
  const baseURL = "http://localhost/Vasilije-prvi%20domaci/api";

  fetchTabele();
  function fetchTabele() {
    $.ajax({
      type: "GET",
      url: baseURL + "/fetch-tabela.php",
      success: function (response) {
        formirajTabelu(JSON.parse(response));
      },
    });
  }
  function formirajTabelu(studenti) {
    studenti.forEach((student, index) => {
      $("#prikazTabele").append(
        `
        <tr>
        <td>${index + 1}</td>
        <td>${student.ime}</td>
        <td>${student.prezime}</td>
        <td>${student.lokalna_grupa}</td>
        <td>${student.godina_studija}</td>
        </tr>
        `
      );
    });
  }
});

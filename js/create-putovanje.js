$(document).ready(function () {
  const baseURL = "http://localhost/Vasilije-prvi%20domaci/api";
  let studenti = Array();
  $.ajax({
    type: "GET",
    url: baseURL + "/fetch-tabela.php",
    success: function (response) {
      studenti = JSON.parse(response);
      studenti.forEach((student) => {
        $("#selectHost").append(
          `
                <option value="${student.id_student}" >${student.ime}</option>
            `
        );
        $("#selectGost").append(
          `
                <option value="${student.id_student}" >${student.ime}</option>
            `
        );
      });
    },
  });

  $("#selectHost").change(function (e) {
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: baseURL + "/fetch-po-id.php",
      data: {
        id_student: $("#selectHost").val(),
      },
      dataType: "json",
      success: function (student) {
        $("#ime_host").val(student.ime);
        $("#prezime_host").val(student.prezime);
        $("#lokalna_grupa_host").val(student.lokalna_grupa);
        $("#godina_studija_host").val(student.godina_studija);
        //$("#prezime_host").val(student.trener);
      },
    })
  });

  $("#selectGost").change(function (e) {
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: baseURL + "/fetch-po-id.php",
      data: {
        id_student: $("#selectGost").val(),
      },
      dataType: "json",
      success: function (student) {
        $("#ime_gost").val(student.ime);
        $("#prezime_gost").val(student.prezime);
        $("#lokalna_grupa_gost").val(student.lokalna_grupa);
        $("#godina_studija_gost").val(student.godina_studija);
      },
    });
  });

  $("#noviStudenti").submit(function (e) {
    e.preventDefault();
    // Inputi za hosta
    let ime_host = $("#ime_host").val();
    let lokalna_grupa_host = $("#lokalna_grupa_host").val();
    let prezime_host = $("#prezime_host").val();
    let godina_studija_host = $("#godina_studija_host").val();

    // Inputi za gosta
    let ime_gost = $("#ime_gost").val();
    let lokalna_grupa_gost = $("#lokalna_grupa_gost").val();
    let prezime_gost = $("#prezime_gost").val();
    let godina_studija_gost = $("#godina_studija_gost").val();
    let naziv_dogadjaja = $('#naziv_dogadjaja').val();
    let broj_dana_boravka = $('#broj_dana_boravka').val();
    if (
      validacija(
        ime_host,
        lokalna_grupa_host,
        
        prezime_host,
        godina_studija_host,
        ime_gost,

        lokalna_grupa_gost,
        
        prezime_gost,
        godina_studija_gost,
        
        naziv_dogadjaja,
        broj_dana_boravka
      )
    )
      dodajPutovanje(
        ime_host,
        lokalna_grupa_host,
        prezime_host,
        godina_studija_host,
        ime_gost,
        lokalna_grupa_gost,
        prezime_gost,
        godina_studija_gost,
        naziv_dogadjaja,
        broj_dana_boravka
      );
  });

  // Ajax
  function dodajPutovanje(
    ime_host,
    lokalna_grupa_host,
    prezime_host,
    godina_studija_host,
    ime_gost,
    lokalna_grupa_gost,
    prezime_gost,
    godina_studija_gost,
    naziv_dogadjaja,
    broj_dana_boravka
  ) {
    $.ajax({
      type: "POST",
      url: baseURL + "/dodaj-putovanje.php",
      data: {
        ime_host,
        lokalna_grupa_host,
        prezime_host,
        godina_studija_host,
        ime_gost,
        lokalna_grupa_gost,
        prezime_gost,
        godina_studija_gost,
        naziv_dogadjaja,
        broj_dana_boravka,
      },
      dataType: "json",
      success: function (response) {
        alert(response);
      },
      error: function (response) {
        alert(response.responseText);
      },
    });
  }

  function validacija(
    ime_host,
    lokalna_grupa,
    prezime_host,
    godina_studija_host,
    ime_gost,
    lokalna_grupa_gost,
    prezime_gost,
    godina_studija_gost,
    naziv_dogadjaja,
    broj_dana_boravka
  ) {
    if (
      ime_host == "" ||
      lokalna_grupa == "" ||
      prezime_host == "" ||
      godina_studija_host == "" ||
      ime_gost == "" ||
      lokalna_grupa_gost == "" ||
      prezime_gost == "" ||
      godina_studija_gost == "" ||
      naziv_dogadjaja == "" ||
      broj_dana_boravka == ""
    ) {
      alert("Sva polja moraju biti popunjena!");
      return false;
    }
    return true;
  }
});

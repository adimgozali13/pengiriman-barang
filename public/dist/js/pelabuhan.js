  $(document).ready(function () {
      $('select[name="negaraasal"]').on("change", function () {
          var negaraId = $(this).val();
          if (negaraId) {
              $.ajax({
                  url: "getPelabuhan/" + negaraId,
                  type: "GET",
                  dataType: "json",
                  success: function (data) {
                      $('select[name="pelabuhan_asal"]').empty();
                      $.each(data, function (key, value) {
                          $('select[name="pelabuhan_asal"]').append(
                              '<option value="' +
                                  value +
                                  '">' +
                                  value +
                                  "</option>"
                          );
                      });
                  },
              });
          } else {
              $('select[name="pelabuhan_asal"]').empty();
          }
      });
      $('select[name="negaratujuan"]').on("change", function () {
          var negaraId = $(this).val();
          if (negaraId) {
              $.ajax({
                  url: "getPelabuhan/" + negaraId,
                  type: "GET",
                  dataType: "json",
                  success: function (data) {
                      $('select[name="pelabuhan_tujuan"]').empty();
                      $.each(data, function (key, value) {
                          $('select[name="pelabuhan_tujuan"]').append(
                              '<option value="' +
                                  value +
                                  '">' +
                                  value +
                                  "</option>"
                          );
                      });
                  },
              });
          } else {
              $('select[name="pelabuhan_tujuan"]').empty();
          }
      });
      $('select[name="kapal"]').on("change", function () {
          var kapalId = $(this).val();
          if (kapalId) {
              $.ajax({
                  url: "getKontainer/" + kapalId,
                  type: "GET",
                  dataType: "json",
                  success: function (data) {
                      $('select[name="id_kontainer"]').empty();
                      $.each(data, function (key, value) {
                          $('select[name="id_kontainer"]').append(
                              '<option value="' +
                                  key +
                                  '">' +
                                  value +
                                  "</option>"
                          );
                      });
                  },
              });
          } else {
              $('select[name="id_kontainer"]').empty();
          }
      });
  });
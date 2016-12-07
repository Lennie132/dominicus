$(document).ready(function () {

  if ($("form").length > 0) {
    $("form").each(function (i, form) {
      $(form).find('.datepicker').each(function () {
        var currentdate = $(this).val();
        new Pikaday({
          field: this,
          format: 'YYYY',
          firstDay: 1,
          onSelect: function (date) {
            var d = new Date(date);
            this._o.field.value = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
          },
          onOpen: function () {
            //ingevoerde datum doorvoeren naar de calender positie
            var current = $("#" + $(this._o.field).prop("id")).val();
            var parts = current.split("-");
            if (parts.length == 3) {
              parts[0] = parseInt(parts[0]);
              parts[1] = parseInt(parts[1]);
              parts[2] = parseInt(parts[2]);
              if (!isNaN(parts[0]) && !isNaN(parts[1]) && !isNaN(parts[1])) {
                var date = '';
                if (parts[0] > 1000) {
                  //engelse notatie
                  date = parts[0] + '-' + parts[1] + '-' + parts[2];
                } else {
                  //nederlandse notatie
                  date = parts[2] + '-' + parts[1] + '-' + parts[0];
                }
                this.gotoDate(new Date(date));
              }

            }

          }

          //position: 'top left',
          //minDate: new Date(2000, 0, 1),
          //maxDate: new Date(2020, 12, 31),
          //yearRange: [2000,2020]
        });
        $(this).val(currentdate);
      });



      $(form).handleFormLogic();
      /*
       
       $(form).find("input[data-prijs],input[data-korting]").each(function () {
       setPrijsInfo(this);
       
       if ($(this).is(":radio")) {
       $(this).closest('.formulier_div,tr').change(function () {
       setPrijsInfo($(this).find(":checked"), true);
       });
       } else {
       $(this).change(function () {
       setPrijsInfo(this, true);
       });
       }
       });
       $(form).find("option[data-prijs],option[data-korting]").parent('select').each(function () {
       setPrijsInfo(this);
       $(this).change(function () {
       setPrijsInfo(this, true);
       });
       });
       checkConditions(form);
       //calculateTotalPrijs();//deze zit in de checkconditions*/
    });
  }

  $('#submit-print').click(function (e) {
    if ($('html').hasClass("lt-ie10")) {
      e.preventDefault();
      window.focus();
      window.print();
      window.setTimeout(function () {
        $('#submit-form').click();
      }, 3000);
    } else {
      if ($('#form-print')[0].checkValidity()) {
        $('#submit-print').html('even geduld...');
        e.preventDefault();
        document.title = "Inschrijving leerling";
        window.print();
        $('#submit-form').click();
        if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
          submitForm();
        }
      }
    }
  });

  function submitForm() {
    setTimeout(function () {
      $('#submit-form').click();
      submitForm();
    }, 1000);
  }

});






/**
 * Scroll Up plugin made by Daan Wilson 2015-12-24
 */
(function ($) {
  $.fn.handleFormLogic = function (options) {
    var form = this;
    var config = {};
    if (typeof options === 'object') {
      $.extend(config, options);
    }
    this.checkConditions = function () {
      if ($(form).find("[data-conditions]").length > 0) {
        $(form).find("[data-conditions]").each(function (i, element) {
          var valid = form.checkFieldCondition(element);
          if (valid) {
            $(element).show(); //element tonen
            $(element).find("input,select,textarea").data('conditionresult', true);
            $(element).find("input,select,textarea").each(function (i, required) {
              //required attributen terugzetten indien aanwezig.
              if ($(required).data('required')) {
                $(required).attr("required", "required");
              }
            });
          } else {
            $(element).hide();//element verbergen
            $(element).find("input,select,textarea").data('conditionresult', false);
            $(element).find("input:required,select:required,textarea:required").each(function (i, required) {
              //required attributen tijdelijk uitzetten indien aanwezig.
              $(required).data("required", true);
              $(required).removeAttr("required");
            });
          }
//                    // console.log($(form).find("#veld_"))
        });
//                calculateTotalPrijs();
      }
    },
            this.checkFieldCondition = function (field) {
              var conditions = $(field).data('conditions');
              if (conditions.length > 0) {
                var operators = {
                  '==': function (a, b) {
                    return a === b
                  },
                  '!=': function (a, b) {
                    return a !== b
                  },
                  '>': function (a, b) {
                    return a > b
                  },
                  '>=': function (a, b) {
                    return a >= b
                  },
                  '<': function (a, b) {
                    return a > b
                  },
                  '<=': function (a, b) {
                    return a <= b
                  },
                };
                var valid = true;
                for (var i = 0; conditions.length > i; i++) {
                  var veld_id = conditions[i][0];
                  var veld_operator = conditions[i][1];
                  var veld_value = conditions[i][2];
                  //console.log(veld_id,veld_operator,veld_value);
                  var input = $(form).find('[id^="veld_' + veld_id + '"]');
                  var values = [];
                  if (input.length > 1) {
                    //er zijn meerdere opties te kiezen voor dit veld, dus het betreft een radio/checkbox met meerder opties.
                    input.each(function (i, e) {
                      if ($(e).is(":checked")) {
                        values.push($(e).val());
                      }
                    });
                  } else {
                    values.push(input.val());
                  }
                  var valuesindex = values.indexOf(veld_value);
                  //console.log(values);
                  if (valuesindex >= 0) {
                    //de voorwaarde optie is gekozen, controleren of hij aan de voorwaarde voldoet
                    if (!operators[veld_operator](values[valuesindex], veld_value)) {
                      valid = false;
                    }
                  } else {
                    valid = false;
                  }
                }
                return valid;
              }
              return true;
            },
            this.setKortingen = function () {
              $(form).find("input,option").each(function (i, input) {
                $(input).data("korting-extra", 0);
              });

              $(form).find("input[data-korting-veld],option[data-korting-veld]").each(function (i, input) {
                var k = $(input).data('korting-veld');
                if (typeof k == 'object') {
                  var veld_id = k[0];
                  var korting_value = k[1];
                  var setkorting = false;
                  if ($(input).is(":radio") && $(input).is(':checked')) {
                    setkorting = true;
                  }
                  if ($(input).is(":checkbox") && $(input).is(':checked')) {
                    setkorting = true;
                  }
                  /*if ($(input).is(":option") && $(input).is(':selected')) {
                   setkorting = true;
                   }*/

                  if (setkorting && veld_id > 0 && korting_value > 0) {

                    $(form).find('[id^="veld_' + veld_id + '"]').each(function (i, input) {
                      $(input).data("korting-extra", korting_value);
                    });
                  }
                }
              });
            }
    this.setPrices = function () {
      $(form).find("input[data-prijs]").each(function () {
        form.setPrijsInfo(this);
      });
      $(form).find("option[data-prijs]").parent('select').each(function () {
        form.setPrijsInfo(this);
      });
      form.calculateTotalPrice();
    },
            this.setPrijsInfo = function (el) {
              var prijs = form.getPrice(el, true);
              if (prijs !== false) {
                //we gaan de prijs tonen in het veldje wat hiervoor gemaakt is.
                var prijsElement = $(el).closest('.formulier_div,tr').find(".form_prijs");
                if (isNaN(prijs) || prijs === 0) {
                  prijsElement.html('');
                } else {
                  prijsElement.html(prijsElement.data('valuta') + "&nbsp;" + prijs.toFixed(2));
                }
              }
            }
    this.getPrice = function (el, sum) {
      var prijs = 0;
      var korting = 0;

      if (typeof $(el).data('conditionresult') === 'undefined' || $(el).data('conditionresult') === true) {
        korting = form.getExtraKorting(el);
        if ($(el).attr("type") == 'number') {
          //bij nummeriek veld, de prijs maal aantal doen.
          prijs = parseFloat($(el).data('prijs')) * parseFloat($(el).val());

        } else if ($(el).is(':checkbox')) {
          if (sum) {
            $(el).closest('.formulier_div,tr').find(":checked").each(function (i, input) {
              prijs += parseFloat($(input).data('prijs'));
            });
          } else {
            if ($(el).is(":checked")) {
              prijs = parseFloat($(el).data('prijs'));
            } else {
              return false;
            }
          }
        } else if ($(el).is(":radio")) {
          if ($(el).is(":checked")) {
            prijs = parseFloat($(el).data('prijs'));
          } else {
            return false;
          }
        } else {
          //het gaat om een select box, dus nu de geselecteerde optie pakken.
          prijs = parseFloat($(el).find(':selected').data('prijs'));
          /* if($(el).find(':selected').data("korting-extra")){
           korting = parseFloat($(el).data("korting-extra"));
           }*/
        }
      }
      //we gaan de prijs tonen in het veldje wat hiervoor gemaakt is.
      return parseFloat(prijs) * ((100 - korting) / 100);
    }
    this.getKorting = function (el) {
      if (typeof $(el).data('conditionresult') == 'undefined' || $(el).data('conditionresult') === true) {
        if ($(el).attr("type") == 'number') {
          if ($(el).val() != '' && $(el).val() !== '0') {
            return parseFloat(el.data('korting'));
          }
        } else if ($(el).is(':checkbox') || $(el).is(":radio")) {
          if ($(el).is(":checked")) {
            return parseFloat($(el).data('korting'));
          }
        } else {
          //het gaat om een select box, dus nu de geselecteerde optie pakken.
          return parseFloat($(el).find(':selected').data('korting'));
        }
      }
      return 0;
    }
    this.getExtraKorting = function (el) {
      var korting = 0;
      var extra = $(el).data("kortingextra");
      if (extra && extra.length > 0) {

        for (var i = 0; extra.length > i; i++) {
          var veld_id = extra[i][0];
          var veld_korting = extra[i][1];
          var veld_value = extra[i][2];

          $(form).find('[id^="veld_' + veld_id + '"]').each(function (i, input) {
            if ($(input).is(":radio") && $(input).is(':checked')) {
              if ($(input).val() === veld_value) {
                korting = parseFloat(veld_korting);
              }
            }
          });
        }
      }
      return korting;
    }
    this.calculateTotalPrice = function () {
      if ($(form).find("input[data-prijs],option[data-prijs]").length > 0) {
        var prijs = 0;
        $(form).find("input[data-prijs],option[data-prijs]").each(function (i, input) {
          prijs += form.getPrice(input);
        });

        /** KORTING BEREKENEN **/
        $(form).find("input[data-korting],option[data-korting]").each(function (i, input) {
          var korting = form.getKorting(input);
          if (!isNaN(korting)) {
            prijs = prijs * ((100 - korting) / 100); //korting over totaal prijs
          }
        });

        /** totaalprijs tonen **/
        prijs = parseFloat(prijs);
        var prijsElement = $(form).find(".form_totaalprijs");
        if (isNaN(prijs) || prijs === 0) {
          prijsElement.html('');
        } else {
          prijsElement.html(prijsElement.data('valuta') + "&nbsp;" + prijs.toFixed(2));
        }
      }
    }
    form.checkConditions(); //form conditie velden checken of deze getoond moeten worden.
    form.setKortingen();    //veld specifieke kortingen op de velden zetten.
    form.setPrices();       //prijzen zetten/tonen
    $(form).change(function () {
      form.checkConditions();
      form.setKortingen();    //veld specifieke kortingen op de velden zetten.
      form.setPrices();       //prijzen zetten/tonen
    });
  }
})(jQuery);
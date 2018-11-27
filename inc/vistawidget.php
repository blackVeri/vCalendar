<style type="text/css">
    .rojo {
      background: #edaeae!important;
    }
    .azul {
      background: #cee1ed!important;
    }
</style>
<div id="datepicker"></div>
<span class="dt"></span>

<script type="text/javascript">
  jQuery(document).ready(function($) {
    var nom = "<?php echo $n_meses;?>";
    var nom2 = parseInt(nom);
    var noy = "<?php echo $n_anios;?>";
    var noy2 = parseInt(noy);
    var fecha = "<?php echo $fecha;?>";
  //  var colores = "<?php echo $colores;?>";

    jQuery( function() {
        var opt = {
            numberOfMonths: nom2,
            yearRange: new Date().getFullYear().toString()+':+'+2,
            dateFormat: 'dd/mm/yy',
            defaultDate: fecha
          };
    jQuery("#datepicker").datepicker(opt);

    var dateSelected = jQuery("#datepicker").val();
    jQuery(".dt").css({"background-color": "#d4d4d4", "font-size": "25px", "padding": "7px","display": "inline-block","margin-top": "7px"});
    jQuery(".dt").html(dateSelected);

    jQuery("#datepicker").on("change",function(){
        var dateSelected = jQuery(this).val();
        jQuery(".dt").html(dateSelected);

    });

/*La variable anios al principio me funcionaba perfectamente, las flechas del calendario funcionaban. ahora ya no lo hace y veo que la recoge bien. */

/*La variable colores que recojo en PHP no me muestra el valor cuando lo guardo en la configuracion del widget ¿porqué?*/
    var elementos = jQuery("td .ui-state-default");
    var total = elementos.length;
/*Tienen que ser los 10 primeros dias del primer mes que se muestra en ROJO*/
var d = new Date();
var month = d.getMonth(); //notas: el valor se encuentra dentro de data-month

/*Al cambiar de fecha se borran las clases rojo y azul creo que tiene que ver con beforeShowDay, quizá metiendolo en el var opt, funcione?*/
    /*function selectedDay(date, param ) {
     // Do stuff with param
     return [true, ''];
    }

    function doStuff(){
        var param = "param_to_pass";
        $(selector).datepicker({
            beforeShowDay: function (date){
                return selectedDay(date, param );
            }
        }); 
    }  */

     for (var i = 0; i < elementos.length; i++) {
        var parse = parseInt(jQuery("td .ui-state-default")[i].text);
        if (parse <= 10) {
           jQuery("td .ui-state-default" ).eq(i).addClass('rojo');
        } else {
          jQuery("td .ui-state-default" ).eq(i).addClass('azul');
        }
      }


    });
  });
</script>



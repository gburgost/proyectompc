$(function(){
   /* Ponemos evento blur a la escucha sobre id nombre en id cliente. */
   $('#cliente').on('blur','#nombre',function(){
      /* Obtenemos el valor del campo */
      var valor = this.value;
      /* Si la longitud del valor es mayor a 2 caracteres.. */
      if(valor.length>=3){

         /* Cambiamos el estado.. */
         $('#estado').html('Cargando datos de servidor...');

         /* Hacemos la consulta ajax */
         var consulta = $.ajax({
            type:'POST',
            url:'cliente.php',
            data:{nombre:valor},
            dataType:'JSON'
         });

         /* En caso de que se haya retornado bien.. */
         consulta.done(function(data){
            if(data.error!==undefined){
               $('#estado').html('Ha ocurrido un error: '+data.error);
               return false;
            } else {
               if(data.telefono!==undefined){$('#cliente #telefono').val(data.telefono);}
               if(data.direccion!==undefined){$('#cliente #direccion').val(data.direccion);}
               $('#estado').html('Datos cargados..');
               return true;
            }
         });

         /* Si la consulta ha fallado.. */
         consulta.fail(function(){
            $('#estado').html('Ha habido un error contactando el servidor.');
            return false;
         });

      } else {
         /* Mostrar error */
         $('#estado').html('El nombre tener una longitud mayor a 2 caracteres...');
         return false;
      }
   });
});

var DataHora = function(){  
    var monthNames = [ "<span>de</span> Janeiro", "<span>de</span> Fevereiro", "<span>de</span> Março", "<span>de</span> Abril", "<span>de</span> Maio", "<span>de</span> Junho", "<span>de</span> Julho", "<span>de</span> Agosto", "<span>de</span> Setembro", "<span>de</span> Outubro", "<span>de</span> Novembro", "<span>de</span> Dezembro" ]; 
    var dayNames= ["Domingo","Segunda-Feira","Terça-Feira","Quarta-Feira","Quinta-Feira","Sexta-Feira","Sábado"];

    // Criado novo objeto Data
    var newDate = new Date();
    newDate.setDate(newDate.getDate());

    // Exibindo data e hora
    $('#date').html(newDate.getDate() + ' ' + monthNames[newDate.getMonth()]);
    $('#day').html(dayNames[newDate.getDay()]);
      
    setInterval( function() {
      // Exibir minutos
      var minutes = new Date().getMinutes();      
      $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
        },1000);
      
    setInterval( function() {
      // Exibir hora
      var hours = new Date().getHours();
      $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
        }, 1000); 
    };
// };
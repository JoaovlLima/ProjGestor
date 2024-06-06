$(".hamburger").click(function(){
    $(".wrapper").toggleClass("collapse");
 });

 document.addEventListener("DOMContentLoaded", function() {
    console.log("Script carregado corretamente!");
});

document.addEventListener("DOMContentLoaded", function () {
    const sidebarItems = document.querySelectorAll(".sidebar ul li a");
  
    sidebarItems.forEach(item => {
      item.addEventListener("click", function () {
        sidebarItems.forEach(i => i.classList.remove("active"));
        this.classList.add("active");
      });
    });
  });

//   fragmentos 

$(document).ready(function() {
    // Carregar o fragmento
    $("#wrapper-container").load("fragmento.html", function() {
      // Callback após o fragmento ser carregado
      $(".hamburger").click(function() {
        $(".wrapper").toggleClass("collapse");
      });

      // Adiciona evento para destacar o item ativo na barra lateral
      $(".sidebar ul li a").click(function() {
        $(".sidebar ul li a").removeClass("active");
        $(this).addClass("active");
      });
    });
  });

  // area perfil

  document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.user-profile a').addEventListener('click', function(event) {
        event.preventDefault();
        var profileInfo = document.querySelector('.profile-info');
        if (profileInfo.style.display === 'block') {
            profileInfo.style.display = 'none';
        } else {
            profileInfo.style.display = 'block';
        }
    });

    // Fechar a div se clicar fora dela
    document.addEventListener('click', function(event) {
        var profileInfo = document.querySelector('.profile-info');
        var userProfile = document.querySelector('.user-profile a');
        if (!userProfile.contains(event.target) && !profileInfo.contains(event.target)) {
            profileInfo.style.display = 'none';
        }
    });
});

let toggle_menu = document.getElementById('responsive_menu');
        let menu = document.getElementById('menu');

        toggle_menu.onclick = function() {
            toggle_menu.classList.toggle('active');
            menu.classList.toggle('responsive');
        }

        
        function dropdownFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
          
          // Close the dropdown if the user clicks outside of it
          window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
              let dropdowns = document.getElementsByClassName("dropdown-content");
              let i;
              for (i = 0; i < dropdowns.length; i++) {
                let openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                  openDropdown.classList.remove('show');
                }
              }
            }
          }
        }
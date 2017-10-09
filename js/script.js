function aggiungiSviluppatore() {
			if(document.sviluppatore.piva.value==""){
				alert("P.IVA obbligatorio");
				return false;
			}
			if(document.sviluppatore.nome.value=="" || document.sviluppatore.cognome.value==""){
				alert("Nome e Cognome dello sviluppatore obbligatori");
				return false;
			}
			if(document.sviluppatore.telefono.value<0){
				alert("Inserisci un numero di telefono valido");
				return false;
			}
			//window.alert(document.iscrizione.sesso.value);
			//window.alert(document.iscrizione.elements["sesso"].value);
			//Altri controlli
			document.sviluppatore
			return true;
		}
function aggiungiUtente() {
			if(document.utente.Username.value==""){
				alert("Nome utente obbligatorio");
				return false;
			}
			if(document.utente.Password.value==""){
				alert("Password obbligatoria");
				return false;
			}
			//window.alert(document.iscrizione.sesso.value);
			//window.alert(document.iscrizione.elements["sesso"].value);
			//Altri controlli
			return true;
		}
function aggiungiModulo() {
			if(document.modulo.nome.value==""){
					alert("Inserisci un nome valido per il modulo");
					return false;
			}
			if(document.modulo.funzione.value==""){
				alert("Inserisci una funzione per il modulo");
				return false;
			}
			if(document.modulo.costo.value<0){
				alert("Il costo non puo' essere negativo");
				return false;
			}
			//window.alert(document.iscrizione.sesso.value);
			//window.alert(document.iscrizione.elements["sesso"].value);
			//Altri controlli
			return true;
		}
function aggiungiLayout() {
		if(document.getElementById('svil').value=="Seleziona uno Sviluppatore"){
			return false;
		}
		$('#layout').find('select').not('.form-control').each(function() {
        	if($(this)[0].value=="Seleziona un modulo"){
        		return false;
        	}
   		});
		return true;
	}
var limit = 10; // Max questions
var count = 1; // There are 4 questions already

function addModulo()
{
    // Get the layout form element
    var table = document.getElementById('table');
    var options = document.getElementById(1).innerHTML;
    // Good to do error checking, make sure we managed to get something
    if (table)
    {
        if (count < limit)
        {
        	count++;
            // Create the new text box
            var nuovoModulo = document.createElement('select');
            nuovoModulo.innerHTML = options
            nuovoModulo.name = 'Modulo '+ (count);
            nuovoModulo.id = count;
	        
            // Good practice to do error checking
            if (nuovoModulo)   
            {
            	var row = table.insertRow(-1);
            	var cell = row.insertCell(0);
            	var cell1 = row.insertCell(1);
                // Add the new elements to the form
                cell.innerHTML = "Modulo "+ count;
                cell1.appendChild(nuovoModulo);
                // Increment the count
            }

        }
        else   
        {
            alert('Question limit reached');
        }
    }
}
function removeModulo(){
	    var table = document.getElementById('table');
	    if(table && count>1){
	    	table.deleteRow(-1);
	    	count --;
	    }
}

function verificaCampi() {
			if(document.utente.Username.value=="" || document.utente.Password.value==""){
				alert("Tutti i campi sono obbligatori");
				return false;
			}
			//window.alert(document.iscrizione.sesso.value);
			//window.alert(document.iscrizione.elements["sesso"].value);
			//Altri controlli
			document.sviluppatore
			return true;
		}
function verificaIscrizione(){
			if(document.utente.Username.value=="" || document.utente.Password.value==""){
				alert("Nome utente e Password obbligatori");
				return false;
			}
			if(document.utente.Password.value!=document.utente.RepeatPassword.value){
				alert("Le Password non coincidono");
			}
}
function updateForm(){
	if(document.getElementById("select").selectedIndex>0){
		  var x = document.getElementById("select").value;
		  $("#form").load("Add"+x);
	}
}

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
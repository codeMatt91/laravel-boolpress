 // METODO PER APRIRE UNA MODALE E CHIEDERE CONFERMA ELIMINAZIONE
 const delectForm = document.querySelectorAll('.delete-form');

 deleteForm.forEach(form => {
     form.addEventListener('submit', (e) => {
         e.preventDefault();

         const accept = confirm(
             'Are you sure you want to delete this?');
         if (accept) e.target.submit();
     });
 });
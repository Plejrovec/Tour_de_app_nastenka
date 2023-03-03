<script type="text/javascript">



function openForm() {
  document.getElementById("myForm").style.display = "block";
}


function editEntry(id) {
  var data = {"id_edit" : id}; 
  jQuery.ajax({
      url :'includes/edit_form.php',
      method : "post",
      data : data,
      success : function(data) {
          jQuery('body').append(data);
          
          document.getElementById("myForm1").style.display = "block";
      },
      error : function() {
          alert("something went wrong!")
      },})
}


function closeForm() {
  document.getElementById("myForm","myForm1").style.display = "none";
  location.reload();
}

function deleteEntry(id) {
		data = {'id': id}
		jQuery.ajax({
			url : "parsers/delete_entry.php",
			method : 'post',
			data : data,
			success : function(d){location.reload()},
			error : function() { alert("nelze smazat zápis")}
		})
	}

  function Show_pop(action) {
    if (action == "import") {
      if (document.getElementById("ano-popup").style.display == "block") {
        document.getElementById("ano-popup").style.display = "none"
      } else {
        document.getElementById("ano-popup").style.display = "block"
      }
    }
  }



</script>
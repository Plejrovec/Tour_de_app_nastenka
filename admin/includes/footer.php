<script type="text/javascript">
  function open_entry_form() {
    document.getElementById("create-entry-form").style.display = "block";
  }
  
  function open_user_form() {
    document.getElementById("create-user-form").style.display = "block";
  }



  function editUser(id) {

    var data = {
      "id_edit": id
    };
    jQuery.ajax({
      url: 'includes/edit_user_form.php',
      method: "post",
      data: data,
      success: function(data) {
        jQuery('body').append(data);

        document.getElementById("edit-user-form").style.display = "block";
      },
      error: function() {
        alert("something went wrong!")
      },
    })
  }

  function editEntry(id) {

    var data = {
      "id_edit": id
    };
    jQuery.ajax({
      url: 'includes/edit_entry_form.php',
      method: "post",
      data: data,
      success: function(data) {
        jQuery('body').append(data);

        document.getElementById("edit-entry-form").style.display = "block";
      },
      error: function() {
        alert("something went wrong!")
      },
    })
  }


  function closeForm() {
    document.getElementsByClassName("form-popup").display = "none";
    location.reload();
  }

  function deleteUser(id) {
    data = {
      'id': id
    }
    jQuery.ajax({
      url: "parsers/delete_user.php",
      method: 'post',
      data: data,
      success: function(d) {
        location.reload()
      },
      error: function() {
        alert("nelze smazat zápis")
      }
    })
  }

  function deleteEntry(id) {
    data = {
      'id': id
    }
    jQuery.ajax({
      url: "parsers/delete_entry.php",
      method: 'post',
      data: data,
      success: function(d) {
        location.reload()
      },
      error: function() {
        alert("nelze smazat zápis")
      }
    })
  }

  function Show_popup(action) {
    if (action == "import") {
      if (document.getElementById("import-popup").style.display == "block") {
        document.getElementById("import-popup").style.display = "none"
      } else {
        document.getElementById("import-popup").style.display = "block"
      }
    }
    if (action == "user") {
      if (document.getElementById("user-popup").style.display == "block") {
        document.getElementById("user-popup").style.display = "none"
      } else {
        document.getElementById("user-popup").style.display = "block";
      }
    }

  }
</script>
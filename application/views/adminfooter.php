</div>
  </div>
  <script>
      feather.replace();
      $(document).ready(function(){
        $('#logout').on('click', function(){
          $.confirm({
            title: 'Confirm!',
            content: 'Simple confirm!',
            buttons: {
                cancel: function () {
                },
                somethingElse: {
                    text: 'Logout',
                    btnClass: 'btn-blue',
                    keys: ['enter', 'shift'],
                    action: function(){
                       var logout = "<?php echo base_url(); ?>logout";
                       window.location.replace(logout);
                      }
                  }
              }
          });
        });
      });
    </script>
</body>

</html>
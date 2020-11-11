<script type="text/javascript" src="{{ asset('dist-assets/js/plugins/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dist-assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dist-assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dist-assets/js/scripts/script.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dist-assets/js/scripts/sidebar.large.script.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dist-assets/js/plugins/echarts.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dist-assets/js/scripts/echart.options.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dist-assets/js/scripts/dashboard.v1.script.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dist-assets/js/scripts/customizer.script.min.js') }}"></script>
    <script src="{{ asset('dist-assets/js/plugins/datatables.min.js') }}"></script>
    <script src="{{ asset('dist-assets/js/scripts/datatables.script.min.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
      $(function () {
    //   $('#select2').select2();
      $('.select2').select2();
      });



      $(document).ready(function() {
	$("#role").change(function() {

		// var selectedVal = $("#myselect option:selected").text();
		var id = $("#role option:selected").val();

        if(id == 1){
            $( ".faculty" ).removeClass( "faculty_show" );

            $( ".student" ).removeClass( "student_show" );
        }

        if(id == 2){
            $( ".faculty" ).addClass( "faculty_show" );

            $( ".student" ).removeClass( "student_show" );
        }

        if(id == 3){
            $( ".student" ).addClass( "student_show" );
            $( ".faculty" ).removeClass( "faculty_show" );
        }

	});
});


</script>

<script>
    // Get the modal
    var modal = document.getElementById("photoModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    </script>

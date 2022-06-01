 <footer class="py-4 bg-light mt-auto">
     <div class="container-fluid px-4">
         <div class="d-flex align-items-center justify-content-between small">
             <div class="text-muted">Copyright &copy; Final project 2022</div>
             <div>
                 <a href="#">Privacy Policy</a>
                 &middot;
                 <a href="#">Terms &amp; Conditions</a>
             </div>
         </div>
     </div>
 </footer>
 </div>
 </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
 <script src="{{asset('template/js/scripts.js')}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
 <script src="{{asset('template/assets/demo/chart-area-demo.js')}}"></script>
 <script src="{{asset('template/assets/demo/chart-bar-demo.js')}}"></script>
 <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
 <script src="{{asset('template/js/datatables-simple-demo.js')}}"></script>
 <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
 <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
 <script>
     $(function() {
         $("#start_from").datepicker({
             dateFormat: "yy-mm-dd"
         }).val();
     });
 </script>
 <script>
     $(function() {
         $("#datepicker").datepicker({
             dateFormat: "yy-mm-dd"
         }).val();
     });
     $(function() {
         var now = new Date();

         var day = ("0" + now.getDate()).slice(-2);
         var month = ("0" + (now.getMonth() + 1)).slice(-2);

         var today = now.getFullYear() + "-" + (month) + "-" + (day);

         //  $('#currentDate').val(today);
         $("#currentDate").datepicker({
             dateFormat: "yy-mm-dd"
         }).val();
     });
     $(function() {
         $("#from").datepicker({
             dateFormat: "yy-mm-dd",
             minDate: 0,
             maxDate: "+6M"
         }).val();
     });
     $(function() {
         $("#to").datepicker({
             dateFormat: "yy-mm-dd",
             maxDate: "+1Y"
         }).val();
     });
     $(".alert-dismissible").delay(5000).slideUp(1000, function() {
         $(this).alert('close');
     });
 </script>
 <script type="text/javascript">
     $('#mail').on('change', function() {
         if (this.value == "1") {
             $('#department').show();
         } else {
             $('#department').hide()
         }

         if (this.value == "2") {
             $('#person').show()
         } else {
             $('#person').hide()

         }
     })
 </script>
 </body>

 </html>
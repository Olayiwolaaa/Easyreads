<footer class="sticky-footer bg-white">
  <div class="container my-auto">
      <div class="copyright text-center my-auto">
          <span>Copyright &copy; <strong>tahmid-ni7</strong> <span id="year"></span></span>
      </div>
  </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<!-- Bootstrap core JavaScript-->
<script src="{{asset('asset/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('asset/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('asset/js/sb-admin-2.min.js')}}"></script>

<!-- Page level plugins -->
<script src="{{asset('asset/vendor/chart.js/Chart.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('asset/js/demo/chart-area-demo.js')}}"></script>
<script src="{{asset('asset/js/demo/chart-pie-demo.js')}}"></script>
<!-- Page level plugins -->
<script src="{{asset('asset/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('asset/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('asset/js/demo/datatables-demo.js')}}"></script>
@yield('script')
<script>
$('#year').text(new Date().getFullYear())
</script>
 //$("#form_field").chosen("destroy"); https://harvesthq.github.io/chosen/
 $(document).ready(function() {
     $(".chosen-search").chosen({
         no_results_text: "Oops, nothing found!",
         allow_single_deselect: true,

     });
     $.validator.setDefaults({ ignore: ":hidden:not(select)" });
 });
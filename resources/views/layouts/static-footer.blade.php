<script src="{!! asset(config('app.themes').'/js/alertify.js') !!}" type="text/javascript"></script>

<script type="text/javascript">
    $( document ).ready(function() {
       $(".branch_list").change(function () {
           var branch_id = $(this).val();
           $.ajax({
               url: "/student/getClass/"+ branch_id,
               cache: false
           }).done(function( html ) {
               $( ".grade_list" ).html( html );
           });
       });

        $(".select_branch").change(function () {
            var branch_id = $(this).val();
            $.ajax({
                url: "/user/getTeacher/"+ branch_id,
                cache: false
            }).done(function( html ) {
                $( ".teacher_list" ).html( html );
            });
        })

    });
</script>